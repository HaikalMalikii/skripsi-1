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

        <title>Add Forum</title>
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Roboto+Condensed&display=swap');
            @import url('https://fonts.googleapis.com/css2?family=Roboto+Condensed&family=Roboto+Mono:ital,wght@0,400;1,500&display=swap');
            @import url('https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Roboto+Condensed&family=Roboto+Mono:ital,wght@0,400;1,500&display=swap');

            h3 {
                font-family: 'Bebas Neue', cursive;
            }

            .btn {
                background-color: #FFE3A9;
                color: black;
                border-color: grey;
                border-width: 2px;
                border-radius: 10px;
                font-family: 'Roboto Mono', monospace;
            }

            th {
                font-family: 'Roboto Condensed', sans-serif;
            }

            .colour-text {
                color: black;
            }
        </style>
    </head>

    <body>
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
                                    Sort By
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="/aduan-kebersihan">Kebersihan</a>
                                    <a class="dropdown-item" href="/aduan-kesehatan">Kesehatan</a>
                                    <a class="dropdown-item" href="/aduan-publik">Fasilitas Publik</a>
                                </div>
                            </div>

                            @foreach ($Aduan as $f)
                                <div class="card w-90">
                                    <div class="card-body">
                                        <a>
                                            <p class="colour-text card-text">
                                                {{ date('Y-m-d H:i:s', strtotime($f->created_at)) }}</p>
                                            <p>{{ $f->Judul }}</>
                                                <p class="colour-text card-text">{{ $f->Deskripsi }}</p>
                                                <p class="colour-text card-text">{{ $f->name }}</p>
                                                <img src="{{ asset("css/foto/$f->Gambar") }}" alt=""
                                                    srcset="">
                                        </a>
                                        <button type="button" class="btn btn-primary" data-toggle="modal"
                                            data-target="#tindakLanjut{{ $f->id }}">
                                            Tindak Lanjut
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade bd-example-modal-xl" id="tindakLanjut{{ $f->id }}"
                                            tabindex="-1" aria-labelledby="tindakLanjutLabel{{ $f->id }}Label"
                                            aria-hidden="true">
                                            <div class="modal-dialog modal-xl">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title"
                                                            id="tindakLanjutLabel{{ $f->id }}Label">
                                                            Judul Aduan {{ $f->Judul }}</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="/admin-tindak-lanjut/{{ $f->id }}"
                                                            method="POST" enctype="multipart/form-data">
                                                            @csrf
                                                            <div class="form-group">
                                                                <label for="judul">Ketik Tindak Lanjut *Aduan/Tindak
                                                                    Lanjut*</label>
                                                                <input placeholder="Judul" id="judul" type="text"
                                                                    class="form-control @error('judul') is-invalid @enderror"
                                                                    name="judul" value="{{ $f->Judul }}" required
                                                                    autocomplete="judul" autofocus>

                                                                @error('judul')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Tindak Lanjut
                                                            Aduan</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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
