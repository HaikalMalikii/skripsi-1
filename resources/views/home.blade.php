@extends('layouts.app')

@section('content')

    <head>
        <style>
            /* Set height of the grid so .sidenav can be 100% (adjust if needed) */
            .row.content {
                height: 1500px
            }

            /* Set gray background color and 100% height */
            .sidenav {
                background-color: #f1f1f1;
                height: 100%;
            }

            /* Set black background color, white text and some padding */

            /* On small screens, set height to 'auto' for sidenav and grid */
            @media screen and (max-width: 767px) {
                .sidenav {
                    height: auto;
                    padding: 15px;
                }

                .row.content {
                    height: auto;
                }
            }

            /*
                        .container-fluid {
                            background-color: lightcoral;
                        } */

            h1 {
                font-size: 4vw;
            }

            .lead {
                font-size: 2vw;
            }


            /* .col-sm-3 {
                                        float: right;
                                        background-color: white;
                                        margin-top: 50px;
                                        margin-left: 20px;
                                        margin-right: 50px;
                                    }

                                    .col-sm-7 {
                                        float: left;
                                        margin-top: 50px;
                                        margin-left: 20px;
                                        margin-right: 20px;
                                    } */

            .image {
                width: 100%;
                height: 100%;
            }

        </style>
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    </head>

    <body class="home">
        <div class="container">
            <div class="row">
                <div class="col-sm-8">
                    <h1 class="display-4">WELCOME TO LAPORIN</h1>
                    <p class="lead my-5">menyediakan berbagai kemudahan bagi anda untuk berinteraksi dan menyampaikan
                        keluhan anda
                    </p>
                    <a class="btn btn-primary btn-lg" type="button" href="/AddAduan"><img src="css/foto/lapor.png"
                            alt="lapor">Lapor</a>
                    <!-- <a class="btn btn-primary btn-lg" type="button" href="/AduanViewUser/{{ Auth::user()->id }} "><img src="css/foto/lapor.png"alt="lapor">List Aduan</a> -->
                    <a class="btn btn-primary btn-lg" type="button" href="/forum"><img src="css/foto/forum.png"
                            alt="lapor">Forum</a>
                    <a class="btn btn-primary btn-lg" type="button" href="/berita"><img src="css/foto/news.png"
                            alt="lapor">Berita</a>

                </div>

                <div class="col-sm-4">
                    <div class="well">
                        <h4 class="text-center">FORUM MASYARAKAT</h4>
                    </div>
                    @foreach ($detailforum as $df)
                        <div class="card text-center" style="width: 100%;">
                            <div class="card-body">
                                <h5 class="card-title">{{ $df->Judul }}</h5>
                                <!-- <img style="" class="img img-fluid p-2 rounded-lg"src="{{ asset("css/foto/$df->Gambar") }}" alt=""> -->
                                <p class="card-text">{{ Illuminate\Support\Str::limit($df->Deskripsi, 200) }}</p>
                                <a href="/ForumDetail/{{ $df->id }}" class="btn btn-warning btn-sm">Cek Selengkapnya</a>
                            </div>
                        </div>
                    @endforeach
                    <!-- {{ $detailforum->appends(['berita' => $berita->currentPage()])->links() }} -->
                </div>
            </div>
        </div>
        <br>
        <div class="jumbotron text-center" style="margin-bottom:0">
            <h4 class="text-center mt-3">BERITA TERKINI</h4>
            <div class="d-flex justify-content-center">
                <div class="card-group">
                    @foreach ($berita as $b)
                        <div class="card mb-3" style="max-width: 540px;">
                            <div class="row no-gutters">
                                <div class="col-md-4">
                                    <img class="image" src="{{ asset("css/foto/$b->image") }}" alt="">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $b->judul }}</h5>
                                        <p class="card-text">{{ Illuminate\Support\Str::limit($b->description, 100) }}
                                        </p>
                                        <p class="card-text"><small class="text-muted">
                                                {{ isset(Auth::user()->created_at) ? Auth::user()->created_at->format('d/M/Y') : Auth::user()->email }}</small>
                                        </p>
                                        <a href="/detail-berita/{{ $b->id }}" class="btn btn-warning btn-sm">Cek Selengkapnya</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <!-- {{ $berita->appends(['detailforum' => $detailforum->currentPage()])->links() }} -->
        </div>

        @include('sweetalert::alert')
    </body>
@endsection
