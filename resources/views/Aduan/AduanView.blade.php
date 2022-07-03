@extends('layouts.layoutsInstansi')

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
            .card-body:hover {
                background-color: lightblue;
            }
        </style>
        <!-- <div>
                                                                                <div class="bg-light clearfix">
                                                                                    <a href="/Admin.dashboardAdminInstansi" type="button" class="btn float-right">Kembali</a>
                                                                                </div>
                                                                            </div> -->
    </head>

    <body>
    <div class="">
            <a href="/" class="float-left">Kembali</a>
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
                                    <a class="dropdown-item" href="/aduan-kebersihan">Kebersihan</a>
                                    <a class="dropdown-item" href="/aduan-kesehatan">Kesehatan</a>
                                    <a class="dropdown-item" href="/aduan-publik">Fasilitas Publik</a>
                                    <a class="dropdown-item" href="/Aduan">All</a>
                                </div>
                            </div>

                            @foreach ($Aduan as $f)
                                @if ($f->Persetujuan == 1)
                                    <div class="card w-90" style="background-color: #5FD068;">
                                        <a href="/AduanDetail/{{ $f->id }}"
                                            class="stretched-link text-decoration-none">
                                            <div class="card-body">
                                                <a>
                                                    <p class="colour-text card-text">
                                                        {{ date('Y-m-d H:i:s', strtotime($f->created_at)) }}</p>
                                                    <a class="card-title"
                                                        href="/AduanDetail/{{ $f->id }}">{{ $f->Judul }}</a>
                                                    <p class="card-text">Bagian: {{ $f->Bagian }}</p>
                                                    <p class="card-text">Status: Aduan di proses</p>
                                                </a>
                                            </div>
                                        </a>
                                    </div>
                                @elseif ($f->Persetujuan == 2)
                                    <div class="card w-90" style="background-color: #F24C4C;">
                                        <a href="/AduanDetail/{{ $f->id }}"
                                            class="stretched-link text-decoration-none">
                                            <div class="card-body">
                                                <a>
                                                    <p class="colour-text card-text">
                                                        {{ date('Y-m-d H:i:s', strtotime($f->created_at)) }}</p>
                                                    <a class="card-title"
                                                        href="/AduanDetail/{{ $f->id }}">{{ $f->Judul }}</a>
                                                    <p class="card-text">Bagian: {{ $f->Bagian }}</p>
                                                    <p class="card-text">Status: Aduan tidak dapat di proses</p>
                                                </a>
                                            </div>
                                        </a>
                                    </div>
                                @else
                                    <div class="card w-90" style="background-color: #FFB562;">
                                        <a href="/AduanDetail/{{ $f->id }}"
                                            class="stretched-link text-decoration-none">
                                            <div class="card-body">
                                                <a>
                                                    <p class="colour-text card-text">
                                                        {{ date('Y-m-d H:i:s', strtotime($f->created_at)) }}</p>
                                                    <a class="card-title"
                                                        href="/AduanDetail/{{ $f->id }}">{{ $f->Judul }}</a>
                                                    <p class="card-text">Bagian: {{ $f->Bagian }}</p>
                                                    <p class="card-text">Status: Aduan menunggu di proses</p>
                                                </a>
                                            </div>
                                        </a>
                                    </div>
                                @endif
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
