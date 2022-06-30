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


        <title>Pengaduan Masyarakat</title>
        <style>
            .container {
                background-color: lightblue;
                padding: 20px;
            }
        </style>
    </head>


    <a href="/BacktoAduanViewUser" class="previous">
        <button class="btn btn-sm btn-secondary">Kembali</button>
    </a>

    <div class="text-xl-center">
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
        <div class="container">
            <div class="form-row col  justify-content-center">
                <div class="col-6">
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
                        <input type="text" class="form-control" id="LokasiID" name="Location" placeholder="lokasi">
                    </div>
                    <div class="form-group">
                        <label for="deskripsi">Deskripsi:</label>
                        <textarea class="form-control" id="comment" placeholder="Deskripsi" name="Deskripsi"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="Gambar">Gambar</label>

                        <input type="file" class="form-control-file" id="AddAduanGambarID" name="Gambar">
                    </div>

                    <div class="form-group form-row">
                        <button type="submit" name="buttonadd" class="btn btn-primary">Tambahkan Aduan</button>
                    </div>
                </div>
            </div>
        </div>x


    </form>

    @include('sweetalert::alert')
@endsection
