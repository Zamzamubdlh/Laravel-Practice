<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Eloquent-pra</title>
</head>
<body>
    @extends('layouts.template')
        @section('konten')
    @foreach($mahasiswa1 as $data)
            <h3>{{$data->nama}}</h3>
        <h5>Hobi : 
    @foreach($data->hobi as $val)
            <small>{{$val->hobi}},</small>
    @endforeach
    </h5>
    <h4>

    <li>
        Nama Wali : <strong>{{$data ->wali->nama}}</strong>
    </li>
    <li>Nama Dosen :  <strong>{{$data ->dosen->nama}} <small>[{{$data ->dosen-> nipd}}]</small></li>

    </h4>
        <hr>
    @endforeach
        @endsection
</body>
</html>