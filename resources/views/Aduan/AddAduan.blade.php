@extends('layouts.app')

@section('content')
    <!doctype html>
    <html lang="en">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="{{ asset('css/home.css') }}">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">


        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <title>Pengaduan Masyarakat</title>
        <style>
            .form {
                background-color: lightblue;
                padding: 10px;
            }
        </style>
    </head>


    <div class="row align-items-start">
        <a href="/AduanViewUser" class="float-left">
            <img src="css/foto/KEMBALI.png" style="width: 15%;height:15%;">
        </a>
    </div>
    <div class="row justify-content-center">
        <strong>
            <h4 class="AddAduan">Form Pengaduan Masyarakat</h4>
        </strong>
    </div>


    @if ($errors->any())
        <div id="ERROR_COPY" style="display:none;" class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="/AddAduan" method="post" enctype="multipart/form-data">
        @csrf
        <div class="container form">
            <div class="form-row col  justify-content-center">
                <div class="col-10">
                    <div class="form-group">
                        <label for="judul">Judul: </label>
                        <input type="text" class="form-control" id="AddAduanJudulID" name="Judul" placeholder="Judul">
                    </div>

                    <div class="form-group">
                        <label for="judul">Bagian: </label>
                        <select name="Bagian" id="AddAduanBagianID" class="form-control select2">
                            <option selected>Bagian...</option>
                            <option value="Kebersihan"> Kebersihan</option>
                            <option value="Kesehatan"> Kesehatan</option>
                            <option value="Fasilitas Publik"> Fasilitas Publik</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="lokasi">Alamat: </label>
                        <input type="text" class="form-control" id="LokasiID" name="Alamat" placeholder="lokasi">
                    </div>
                    <div class="form-group">
                        <label for="deskripsi">Deskripsi:</label>
                        <textarea class="form-control" id="comment" placeholder="Deskripsi" name="Deskripsi"></textarea>
                    </div>

                    <div class="input-group-btn">
                        <label for="Gambar">Gambar</label>

                        <input type="file" multiple class="form-control-file" id="AddAduanGambarID" name="Gambar[]">
                    </div>
                    <p> max.3 Gambar</p>
                    <div class="form-group form-row">
                        <button type="submit" name="buttonadd" class="btn btn-primary">Tambahkan Aduan</button>
                    </div>
                </div>
            </div>
        </div>x


    </form>

    @include('sweetalert::alert')
@endsection
