<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DosenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
        {
            $dosen = Dosen::all();
            return view('dosen.index', compact('dosen'));
        }

    public function create()
    {
        return view('dosen.create');
    }

    public function store(Request $request)
    {
        $dosen = new Dosen();
        $dosen->nama = $request->nama;
        $dosen->nipd = $request->nipd;
        $dosen->save();
        return redirect()->route('dosen.index')->with(['message'=>'Dosen Berhasil Dibuat']);
    }

    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
