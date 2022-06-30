@extends('layouts.layoutsKelurahan')

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

        <title>Add Forum</title>
        <style>
            
            .judul {
                font-size: 20px;
                color: black;
            }
            .card-body:hover {
                background-color: lightblue;
            }
        </style>
    </head>

    <body>
    <div class="">
            <a href="/admin-kelurahan-status" class="float-left">Kembali</a>
        </div>
        <div class="main">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel">
                            <div class="panel-heading">
                                <h3 class="panel-title">Aduan Masyarkat</h3>
                                {{-- <div class="right">
                                    @guest
                                        <a href="{{ url('login') }}" class="btn btn-sm btn-primary">New Forum</a>
                                    @else
                                        <a href="{{ url('/addforum') }}" class="btn btn-sm btn-primary">New Forum</a>
                                    @endguest
                                </div> --}}
                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Show By
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="/aduan-kebersihan-kelurahan">Kebersihan</a>
                                    <a class="dropdown-item" href="/aduan-kesehatan-kelurahan">Kesehatan</a>
                                    <a class="dropdown-item" href="/aduan-publik-kelurahan">Fasilitas Publik</a>
                                    <a class="dropdown-item" href="/admin-kelurahan-status">All</a>
                                </div>
                            </div>

                            @foreach ($Aduan as $f)
                                <div class="card w-90">
                                    <a href="/admin-Kelurahan-AduanDetail/{{ $f->id }}" class="stretched-link text-decoration-none">
                                        <div class="card-body">

                                            <a class="judul">
                                                <p class="colour-text card-text">
                                                    {{ date('Y-m-d H:i:s', strtotime($f->created_at)) }}</p>
                                                <a class="judul card-title" href="/admin-Kelurahan-AduanDetail/{{ $f->id }}">{{ $f->Judul }}</a>
                                                <p class="card-text">Bagian: {{ $f->Bagian }}</p>
                                                <!-- <p class="colour-text card-text">{{ $f->Deskripsi }}</p> -->
                                                <p class="colour-text card-text">{{ $f->name }}</p>
                                                <img src="{{ asset("css/foto/$f->Gambar") }}" alt="" srcset=""">

                                            </a>


                                        </div>
                                    </a>
                                </div>
                            @endforeach





                        </div>


                    </div>
                </div>
            </div>
        </div>
        </div>


    </body>

    </html>
@endsection
