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
            p{
                color: black;
            }
            .addforum{
            background-color: lightblue;
            padding-top: 20px;
        }
        .card{
            background-color: lightblue;
        }
        .image{
            width: 100%;
            height: 100%;
        }
        </style>
    </head>

    <body>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="/AddnewForum" method="post" enctype="multipart/form-data">
        @csrf
        <div class="container addforum">
        <div class="form-row">
            <div class="col-4">
                <div class="form-group">
                    <div class="row">
                        <div class="col">
                            <input type="text" class="form-control" id="AddAduanJudulID" name="Judul" placeholder="Judul">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-1">
                            <textarea id="forumaspirasi"  placeholder="Deskripsi" name="Deskripsi"rows="4" cols="50" ></textarea>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col">
                            <label for="exampleGroupExampleInput">Gambar</label>
                        </div>
                        <div>
                            <input type="file" class="form-control-file" id="imageforumaddid" name="Gambar">
                            
                        </div>
                    </div>
                </div>
                
                <div class="form-group form-row justify-content-left">
                    @guest
                        <a href="{{ url('login') }}" class="btn btn-sm btn-primary">Submit Forum</a>
                     @else
                     <button type="submit" name="buttonadd" class="btn btn-primary">Submit Forum</button>
                    @endguest
                </div>
            </div>
            </div>
        </div>
    </form>
<br>
        <div class="main">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel">
                            <div class="panel-heading">
                                <div class="right">
                                </div>
                            </div>
                            @foreach ($forum as $f)
                            <div class="card w-90">
                                <div class="row no-gutters">
                                    <div class="col-md-2">
                                    <img class="image" src="{{ asset("css/foto/$f->Gambar") }}" alt="" srcset="">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <p class="colour-text card-text">Dibuat  : {{ date("Y-m-d H:i:s", strtotime($f->created_at)) }}</p>
                                            {{-- <a href="/ForumDetail/{{ $f->id }}">Judul : {{ $f->Judul }}</a> --}}
                                            <p>Judul : {{ $f->Judul }}</p>
                                            <p class="card-text">Deskripsi :{{ $f->Deskripsi }}</p>
                                            <p class="card-text">Forum Oleh :{{ $f->name }}</p>
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                <a href="/ForumDetail/{{ $f->id }}"
                                            class="btn btn-warning btn-sm">Comment</a>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </body>

    </html>
@endsection
