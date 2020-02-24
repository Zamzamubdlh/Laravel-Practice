<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Import Model
use App\Mahasiswa;
use App\Dosen;
use App\Hobi;

// Route One to One
Route::get('relasi-1',function()
{
    // Memilih data mahasiswa yang memiliki nim '101010101'
    $mhs = Mahasiswa::where('nim','=','1010101')->first();
    
    // Menampilkan data wali dari mahasiswa yang di pilih
    return $mhs->wali->nama;
});

Route::get('relasi-2',function()
{
    // Memilih data mahasiswa yang memiliki nim '101010101'
    $mhs = Mahasiswa::where('nim','=','1010101')->first();

    // Menampilkan data dosen dari mahasiswa yang di pilih
    return $mhs->dosen->nama;
});

Route::get('relasi-3',function()
{
    // Mencari dosen dengan yang bernama Zamzam Ubaidilah
    $dosen = Dosen::where('nama','=','Zamzam Ubaidilah')->first();

    // Menampilkan data mahasiswa dari dosen yang di pilih
    foreach ($dosen->mahasiswa as $temp)
    echo '<li>  Nama : ' . $temp->nama .
                '<strong> ' . $temp->nim . '</strong>
                </li>';
});

Route::get('relasi-4',function()
{
    // Mencari mahasiswa yang bernama Dadang
    $dadang = Mahasiswa::where('nama','=','Dadang Pelloy')->first();

    // Menampilkan seluruh hobi dari dadang
    foreach ($dadang->hobi as $temp)
    echo '<li>' . $temp->hobi . '</li>';
});

Route::get('relasi-5',function()
{
    // Mencari mahasiswa yang bernama Dadang
    $futsal = Hobi::where('hobi','=','Futsal')->first();
    
    // Menampilkan semua mahasiswa yang mempunyai hobi Futsal
    foreach ($futsal->mahasiswa as $temp)
    echo '<li>  Nama : ' . $temp->nama .
                '<strong> ' . $temp->nim . '</strong>
                </li>';
});

Route::get('relasi-join', function()
{
    // Join Laravel
    // $sql = Mahasiswa::with('wali')->get();
    $sql = DB::table('mahasiswas')
    ->select('mahasiswas.nama','mahasiswas.nim','walis.nama as nama_wali')
    ->join('walis','walis.id_mahasiswa','=','mahasiswas.id')
    ->get();
    dd($sql);
});

Route::get('eloquent', function()
{
    $mahasiswa = Mahasiswa::with('wali','dosen','hobi')->get();
    return view('eloquent',compact('mahasiswa'));
});

Route::get('eloquent-pra', function()
{
    $mahasiswa1 = Mahasiswa::with('wali','dosen','hobi')->get()->take(1);
    return view('eloquent-pra',compact('mahasiswa1'));
});