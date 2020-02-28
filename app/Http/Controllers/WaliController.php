<?php

namespace App\Http\Controllers;

use App\Wali;
use Illuminate\Http\Request;
use App\Mahasiswa;
class WaliController extends Controller
{
    public function index()
    {
        $wali = Wali::all();
        return view('wali.index',compact('wali'));
    }

    public function create()
    {
        $mahasiswa = Mahasiswa::all();
        return view('wali.create',compact('mahasiswa'));
    }

    public function store(Request $request)
    {
        $wali = new Wali();
        $wali->id_mahasiswa = $request->id_mahasiswa;
        $wali->nama = $request->nama;
        $wali->save();
        return redirect()->route('wali.index')
                ->with(['message'=>'Data Wali Berhasil Di Buat']);
    }

    public function show($id)
    {
        $wali = Wali::findOrFail($id);
        return view('wali.show',compact('wali'));
    }

    public function edit($id)
    {
        $wali = Wali::findOrFail($id);
        $mahasiswa = Mahasiswa::all();
        return view('wali.edit',compact('wali','mahasiswa'));
    }

    public function update(Request $request, $id)
    {
        $wali = Wali::findOrFail($id);
        $wali->id_mahasiswa= $request->id_mahasiswa;
        $wali->nama = $request->nama;
        $wali->save();
        return redirect()->route('wali.index')
                ->with(['message'=>'Data Wali Berhasil Di Edit']);
    }

    public function destroy($id)
    {
        $wali = Wali::findOrFail($id)->delete();
        return redirect()->route('wali.index')
                ->with(['message'=>'Data Wali Berhasil Di Hapus']);
    }
}
