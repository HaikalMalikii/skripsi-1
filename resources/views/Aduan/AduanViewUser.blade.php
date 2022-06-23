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

            .colour-text{
                color: black;
            }
            .setuju{
                background-color: red;
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
                                <div class="right">
                                    @guest
                                        <a href="{{ url('login') }}" class="btn btn-sm btn-primary">New Forum</a>
                                    @else
                                        <a href="{{ url('/addforum') }}" class="btn btn-sm btn-primary">New Forum</a>
                                    @endguest
                                </div>
                            </div>
                            @foreach ($data as $f)
                            @if ($f->Persetujuan == 1)
                                <div class="setuju card w-90">
                                    <div class="card-body">
                                        {{-- <a hrf="/ForumDetail/{{ $f->id }}">{{ $f->Judul }}</a> --}}
                                        <a>
                                        <p class="colour-text card-text"> {{ $f -> created_at ->format('d/m/Y') }}</p>
                                        {{-- <a href="/AduanDetail/{{ $f->id }}">{{ $f->Judul }}</a> --}}
                                        <!-- <p class="colour-text card-text">{{ Auth::user()->name }}</p> -->
                                        <p class="colour-text card-text">{{ $f->Judul }}</p>
                                        <p class="colour-text card-text">{{ $f->Bagian }}</p>
                                        <p class="colour-text card-text">{{ $f->Persetujuan }}</p>
                                        <!-- <p class="colour-text card-text">{{ $f->Gambar }}</p> -->
                                        <!-- <p class="colour-text card-text">{{ $f->Deskripsi }}</p>
                                        <img src="{{ asset("css/foto/$f->Gambar") }}" alt="" srcset="">
                                        </a> -->
                                            
                                        
                                    </div>
                                </div>
                            @endif
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>


    </body>

    </html>
@endsection
