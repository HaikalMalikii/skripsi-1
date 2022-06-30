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
            th {
                font-family: 'Roboto Condensed', sans-serif;
            }

            .setuju {
                background-color: #5FD068;
            }

            .judul {
                font-size: 20px;
                color: black;
            }

            .tolak {
                background-color: #F24C4C;
            }

            .waiting {
                background-color: #FFB562;
            }

            .judul:hover {
                text-decoration: none;
            }
        </style>
        <script>
            var timeout = 3000;
            $('.alert').delay(timeout).fadeOut(300);
        </script>

        </p>
        </div>
        </script>


    </head>

    <body>
        <div class="">
            <a href="/" class="previous">
                <button class="btn btn-sm btn-secondary">Kembali</button>
            </a>
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
                            {{-- @if (Session::has('success'))
                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                    <strong>Tindak Lanjut Ditambahkan!</strong>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif --}}

                            @foreach ($Aduan as $f)
                                <div class="card w-90">
                                    <div class="card-body">
                                        <a>

                                            <a class="judul card-title"
                                                href="/AduanDetailKelurahan/{{ $f->IdPengaduan }}">{{ $f->Judul }}</a>
                                            <p class="colour-text card-text">
                                                {{ date('Y-m-d H:i:s', strtotime($f->created_at)) }}</p>
                                            <p class="card-text">Bagian: {{ $f->Bagian }}</p>
                                            <p class="colour-text card-text">Oleh : {{ $f->name }}</p>
                                            <img src="{{ asset("css/foto/$f->Gambar") }}" alt="" srcset="">
                                            <p class="colour-text card-text">{{ $f->Deskripsi }}</p>


                                            {{-- <p>{{ $f->IdPengaduan }}</p> --}}
                                        </a>
                                        <button type="button" class="btn btn-primary float-right" data-toggle="modal"
                                            data-target="#tindakLanjut{{ $f->IdPengaduan }}">
                                            Tindak Lanjut
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade bd-example-modal-xl"
                                            id="tindakLanjut{{ $f->IdPengaduan }}" tabindex="-1"
                                            aria-labelledby="tindakLanjutLabel{{ $f->IdPengaduan }}Label"
                                            aria-hidden="true">
                                            <div class="modal-dialog modal-xl">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title"
                                                            id="tindakLanjutLabel{{ $f->IdPengaduan }}Label">
                                                            Judul Aduan {{ $f->Judul }}</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="/admin-tindak-lanjut/{{ $f->IdPengaduan }}"
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
                                                        <a type="submit" href="admin-kelurahan-status"
                                                            class="btn btn-primary">Tindak Lanjut
                                                            Aduan</a>
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

        @include('sweetalert::alert')
    </body>


    </html>
@endsection
