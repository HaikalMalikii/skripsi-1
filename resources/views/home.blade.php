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
            footer {
                background-color: #555;
                color: white;
                padding: 15px;
            }

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

            h2 {
                margin: 20px;
            }

            .col-sm-3 {
                float: right;
                background-color: white;
                margin-top: 50px;
                /* margin-left: 50px; */
                /* margin-right: 50px; */
            }

            .col-sm-7 {
                float: left;
                margin-top: 50px;
                margin-left: 50px;
                margin-right: 80px;
            }

            .image {
                width: 100%;
                height: 100%;
            }

            .jumbotron {
                background-color: white;
            }
        </style>
    </head>

    <body class="home">
        <div class="container-fluid">
            <div class="row content">
                <div class="col-sm-7">
                    <h1 class="display-4">WELCOME TO LAPORIN</h1>
                    <p class="lead my-3">menyediakan berbagai kemudahan bagi anda untuk berinetraksi dan menyampaikan
                        keluhan
                    </p>
                    <a class="btn btn-primary btn-lg" type="button" href="/AddAduan"><img src="css/foto/lapor.png"
                            alt="lapor">Lapor</a>
                    <!-- <a class="btn btn-primary btn-lg" type="button" href="/AduanViewUser/{{ Auth::user()->id }} "><img src="css/foto/lapor.png"
                                                                                                        alt="lapor">List Aduan</a> -->
                    <a class="btn btn-primary btn-lg" type="button" href="/addforum"><img src="css/foto/forum.png"
                            alt="lapor">Forum</a>
                    <a class="btn btn-primary btn-lg" type="button" href="/berita"><img src="css/foto/news.png"
                            alt="lapor">Berita</a>

                </div>

                <div class="col-sm-3">
                    <div class="well">
                        <h4 class="text-center">FORUM MASYARAKAT</h4>
                    </div>
                    @foreach ($detailforum as $df)
                        <div class="card text-center" style="width: 100%;">
                            <div class="card-body">
                                <h5 class="card-title">{{ $df->Judul }}</h5>
                                <!-- <img style="" class="img img-fluid p-2 rounded-lg"
                                                                                                                src="{{ asset("css/foto/$df->Gambar") }}" alt=""> -->
                                <p class="card-text">{{ $df->Deskripsi }}</p>
                                <a href="/ForumDetail/{{ $df->id }}" class="btn btn-warning btn-sm">Check it out</a>
                            </div>
                        </div>
                    @endforeach
                    {{ $detailforum->links() }}
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
                                        <a href="/detail-berita/{{ $b->id }}" class="btn btn-warning btn-sm">Lihat
                                            Detail Berita</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <!-- <div class="card" style="width: 20rem;">
                                                                                                    <div class="card-body">
                                                                                                        <h5 class="card-title">{{ $b->judul }}</h5>
                                                                                                        <h5 class="card-title">{{ $b->id }}</h5>

                                                                                                        <img style="" class="img img-fluid p-2 rounded-lg"
                                                                                                            src="{{ asset("css/foto/$b->image") }}" alt="">
                                                                                                        <p class="card-text">{{ Illuminate\Support\Str::limit($b->description, 100) }}</p>
                                                                                                        <a href="/detail-berita/{{ $b->id }}" class="btn btn-warning btn-sm">Lihat Detail Berita</a>
                                                                                                    </div>
                                                                                                </div> -->
                    @endforeach
                </div>

            </div>
            {{ $berita->links() }}
        </div>


    </body>
@endsection
