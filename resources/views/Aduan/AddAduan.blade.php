@extends('layouts.app')

@section('content')
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet"  href="{{asset('css/home.css')}}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="{{asset('css/app.css')}}">

    <title>Pengaduan Masyarakat</title>
</head>



<div class="text-xl-center">
    <strong>
        <p class="AddAduan">Form Pengaduan Masyarakat</p>
    </strong>
</div>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form action="/AddAduan" method="post" enctype="multipart/form-data">
    @csrf
    <div class="d-flex justify-content-center backgroundorder">
        <div class="mt-5 col-4">
            <div class="form-group">
                <div class="row">
                    <div class="col-4">
                        <label for="formGroupExampleInput">Judul</label>
                    </div>
                    <div class="col">
                        <input type="text" class="form-control" id="AddAduanJudulID" name="AddAduanJudul">
                    </div>
                </div>

            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col-4">
                        <label for="formGroupExampleInput">Bagian</label>
                    </div>
                    <div class="col-6">
                        <select name="AddAduanBagian" id="AddAduanBagianID" class="form-control select2">
                            <option value ="Kebersihan"> Kebersihan</option>
                            <option value ="Kesehatan"> Kesehatan</option>
                        </select>
                    </div>
                </div>

            </div>



            <div class="form-group">
                <div class="row">
                    <div class="col-4">
                        <label for="formGroupExampleInput">Deskripsi</label>
                    </div>
                    <div class="col-1">
                        <textarea id="AddAduanDeskripsiID" name="AddAduanDeskripsi"rows="4" cols="50" ></textarea>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col">
                        <label for="exampleGroupExampleInput">Gambar</label>
                    </div>
                    <div>
                        <input type="file" class="form-control-file" id="AddAduanGambarID" name="AddAduanGambar">
                    </div>
                </div>
            </div>

            <div class="form-group form-row justify-content-center">
                <button type="submit" name="buttonadd" class="btn btn-primary">Submit Aduan</button>
            </div>
        </div>
    </div>
</form>
@endsection
