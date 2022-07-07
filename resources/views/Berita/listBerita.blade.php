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

            p {
                color: black;
            }

            .image {
                width: 100%;
                height: 100%;
            }

            .card {
                background-color: lightblue;
            }
        </style>
    </head>
    <div class="row align-items-start">
            <a href="/" class="float-left">
                <img class="image" src="{{ asset("css/foto/KEMBALI.png") }}" style="width: 15%;height:15%;">
            </a>
        </div>
        <div class="main">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel">
                            <div class="panel-heading">
                                <h3 class="panel-title text-center">Berita Masyarkat</h3>
                                <div class="right">
                                </div>
                            </div>
                            @foreach ($berita as $b)
                                <div class="card w-90">
                                    <div class="row no-gutters">
                                        <div class="col-md-2">
                                            <img class="image" src="{{ asset("css/foto/$b->image") }}" alt=""
                                                srcset="">
                                        </div>
                                        <div class="col-md-8">
                                            <div class="card-body">
                                                <strong>
                                                    <a class="card-text"
                                                        href="/detail-berita/{{ $b->id }}">{{ $b->judul }}</a>
                                                </strong>
                                                <p class="card-text">
                                                    {{ Illuminate\Support\Str::limit($b->description, 200) }}</p>
                                                <p class="card-text"><small class="text-muted">
                                                        {{ isset(Auth::user()->created_at) ? Auth::user()->created_at->format('d/M/Y') : Auth::user()->email }}</small>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            {{ $berita->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </body>

    </html>
@endsection
