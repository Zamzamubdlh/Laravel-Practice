@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card text-white bg-info">
                <div class="card-header">
                    Tambah Data Wali
                </div>
                <div class="card-body">
                    <form action="{{route('wali.store')}}" method="POST">
                        @csrf
                            <div class="form-group">
                                <label for="">Wali Mahasiswa</label>
                                <input type="text" name="nama" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="">Nama Mahasiswa</label>
                                <select name="id_mahasiswa" class="form-control">
                                    @foreach ($mahasiswa as $data)
                                    <option value="{{$data->id}}">{{$data->nama}}</option> 
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-dark btn-block">Simpan</button>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection