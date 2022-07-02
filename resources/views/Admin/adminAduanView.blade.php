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
    <div class="row align-items-start">
            <a href="/" class="float-left">
                <img src="css/foto/KEMBALI.png" style="width: 15%;height:15%;">
            </a>
        </div>
        
    <h3 class="card-title row justify-content-center">Aduan Masyarakat</h3>

            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel">
                            <div class="card-heading">
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
                                {{-- <div class="card w-90">
                                    <div class="card-body"> --}}
                                @if ($f->Persetujuan == 1)
                                    <div class="card w-90 " style="background-color: #5FD068;">
                                        <div class="card-body">
                                            <a>
                                                <a class="judul card-title text-capitalize"
                                                    href="/admin-Kelurahan-AduanDetail/{{ $f->id }}">{{ $f->Judul }}</a>
                                                <p class="colour-text card-text">
                                                    {{ date('Y-m-d H:i:s', strtotime($f->created_at)) }}</p>
                                                <p class="colour-text card-text text-capitalize">Disampaikan Oleh : {{ $f->name }}</p>
                                                <!-- <p class="card-text">Bagian: {{ $f->Bagian }}</p> -->
                                                <p class="colour-text card-text">Status : Sedang Diproses</p>
                                                <!-- <img src="{{ asset("css/foto/$f->Gambar") }}" alt=""
                                                    srcset="">
                                                <p class="colour-text card-text">{{ $f->Deskripsi }}</p> -->
                                                {{-- <p>{{ $f->id }}</p> --}}
                                            </a>
                                        </div>
                                    </div>
                                @elseif ($f->Persetujuan == 2)
                                    <div class="card w-90 " style="background-color: #F24C4C;">
                                        <div class="card-body">
                                            <a>
                                                <a class="judul card-title text-capitalize"
                                                    href="/admin-Kelurahan-AduanDetail/{{ $f->id }}">{{ $f->Judul }}</a>
                                                <p class="colour-text card-text">
                                                    {{ date('Y-m-d H:i:s', strtotime($f->created_at)) }}</p>
                                                <p class="colour-text card-text text-capitalize">Disampaikan Oleh : {{ $f->name }}</p>
                                                <!-- <p class="card-text">Bagian: {{ $f->Bagian }}</p> -->
                                                <p class="colour-text card-text">Status : Aduan ditolak</p>
                                                <!-- <img src="{{ asset("css/foto/$f->Gambar") }}" alt=""
                                                    srcset="">
                                                <p class="colour-text card-text">{{ $f->Deskripsi }}</p> -->
                                                {{-- <p>{{ $f->id }}</p> --}}
                                            </a>
                                        </div>
                                    </div>
                                @else
                                    <div class="card w-90 " style="background-color: #FFB562;">
                                        <div class="card-body">
                                            <a>
                                                <a class="judul card-title text-capitalize"
                                                    href="/admin-Kelurahan-AduanDetail/{{ $f->id }}">{{ $f->Judul }}</a>
                                                <p class="colour-text card-text">
                                                    {{ date('Y-m-d H:i:s', strtotime($f->created_at)) }}</p>
                                                <p class="colour-text card-text text-capitalize">Disampaikan Oleh : {{ $f->name }}</p>
                                                <!-- <p class="card-text">Bagian: {{ $f->Bagian }}</p> -->
                                                <p class="colour-text card-text">Status : Menunggu Diproses</p>
                                                <!-- <img src="{{ asset("css/foto/$f->Gambar") }}" alt=""
                                                    srcset="">
                                                <p class="colour-text card-text">{{ $f->Deskripsi }}</p> -->
                                                {{-- <p>{{ $f->id }}</p> --}}
                                            </a>

                                            <button type="button" class="btn btn-primary float-right" data-toggle="modal"
                                                data-target="#tindakLanjut{{ $f->id }}">
                                                Tindak Lanjut
                                            </button>

                                            <!-- Modal -->
                                            <div class="modal fade bd-example-modal-xl"
                                                id="tindakLanjut{{ $f->id }}" tabindex="-1"
                                                aria-labelledby="tindakLanjutLabel{{ $f->id }}Label"
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
                                                                    <input placeholder="Judul" id="judul"
                                                                        type="text"
                                                                        class="form-control @error('judul') is-invalid @enderror"
                                                                        name="judul" value="{{ $f->Judul }}"
                                                                        required autocomplete="judul" autofocus>


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
                                                            <button type="submit" class="btn btn-primary">Tindak
                                                                Lanjut</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                {{-- </div>
                                </div> --}}
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
