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

            .container {
                margin-top: 50px;
                margin-left: 20px;
            }

            h1 {
                font-size: 4vw;
            }

            h2 {
                margin: 20px;
            }
        </style>
    </head>

    <body>
        <div class="container-fluid">
            <div class="row content">
                <div class="col-sm-9">
                    <h1 class="display-4">WELCOME TO LAPORIN</h1>
                    <p class="lead my-3">menyediakan berbagai kemudahan bagi anda untuk berinetraksi dan menyampaikan
                        keluhan
                    </p>
                    <a class="btn btn-primary btn-lg" type="button" href="/AddAduan"><img src="css/foto/lapor.png"
                            alt="lapor">Lapor</a>
                    <a class="btn btn-primary btn-lg" type="button" href="/AduanViewUser/{{ Auth::user()->id }} "><img src="css/foto/lapor.png"
                            alt="lapor">List Aduan</a>
                    <a class="btn btn-primary btn-lg" type="button" href="/addforum"><img src="css/foto/forum.png"
                            alt="lapor">Forum</a>
                    <a class="btn btn-primary btn-lg" type="button" href="/berita"><img src="css/foto/news.png"
                            alt="lapor">Berita</a>
                            <p class="lead my-3">Aduan Terakhir Anda
                            <div class="card w-90">
                                
                                    @foreach ($data as $f)
                                    <a href="/AduanDetail/{{ $f->id }}"  class="stretched-link text-decoration-none">
                                <div class="card-body">
                                    
                                    </p>
                                    
                                        
                                    
                                    {{-- <a hrf="/ForumDetail/{{ $f->id }}">{{ $f->Judul }}</a> --}}
                                    
                                    <p class="colour-text card-text"> {{ $f -> created_at ->format('d/m/Y') }}</p>
                                    
                                    
                                    <p class="colour-text card-text">{{ $f->Judul }}</p>
                                    
                                    {{-- <img src="{{ asset("css/foto/$f->Gambar") }}" alt="" srcset=""> --}}
                                    
                                    @endforeach
                                        
                                    
                                </div>
                            </div>
                            </a>
                </div>
                @foreach ($detailforum as $df)
                    <div class="col-sm-3 sidenav">
                        <div class="well">
                            <h4 class="text-center">FORUM MASYARAKAT</h4>
                        </div>
                        <div class="card text-center" style="width: 100%;">
                            <div class="card-body">
                                <h5 class="card-title">{{ $df->Judul }}</h5>
                                <img style="" class="img img-fluid p-2 rounded-lg"
                                    src="{{ asset("css/foto/$df->Gambar") }}" alt="">
                                <p class="card-text">{{ $df->Deskripsi }}</p>
                                <a href="/ForumDetail/{{ $df->id }}" class="btn btn-warning btn-sm">Go somewhere</a>
                            </div>
                        </div>

                        {{-- <div class="card text-center" style="width: 100%;">
                            <div class="card-body">
                                <h5 class="card-title">Special title treatment</h5>
                                <p class="card-text">With supporting text below as a natural lead-in to additional content.
                                </p>
                                <a href="#" class="btn btn-primary">Go somewhere</a>
                            </div>
                        </div>
                        <div class="card text-center" style="width: 100%;">
                            <div class="card-body">
                                <h5 class="card-title">Special title treatment</h5>
                                <p class="card-text">With supporting text below as a natural lead-in to additional content.
                                </p>
                                <a href="#" class="btn btn-primary">Go somewhere</a>
                            </div>
                        </div> --}}
                    </div>
                @endforeach

            </div>
        </div>
        @foreach ($berita as $b)
            <div class="jumbotron text-center" style="margin-bottom:0">
                <h4 class="text-center mt-3">BERITA TERKINI</h4>
                <div class="d-flex justify-content-center">
                    <div class="card" style="width: 20rem;">
                        <div class="card-body">
                            <h5 class="card-title">{{ $b->judul }}</h5>
                            <h5 class="card-title">{{ $b->id }}</h5>
                            
                            <img style="" class="img img-fluid p-2 rounded-lg"
                                src="{{ asset("css/foto/$b->image") }}" alt="">
                            <p class="card-text">{{ Illuminate\Support\Str::limit($b->description, 100) }}</p>
                            <a href="/detail-berita/{{ $b->id }}" class="btn btn-warning btn-sm">Lihat Detail Berita</a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

    </body>
@endsection
