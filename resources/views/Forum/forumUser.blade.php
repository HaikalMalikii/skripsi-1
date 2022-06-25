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
            .card-title:hover{
                text-decoration: none;
                color: #242F9B;
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
            .card{
                background-color: lightblue;
                padding-top: 20px;
            }
            .image{
                width: 100%;
                height: 100%;
            }
            .form{
                padding-left: 20px;
                color: black;
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
                                                <a class="card-title" href="/ForumDetail/{{ $f->id }}"><strong>{{ $f->Judul }}</strong></a>
                                                <p class="card-text">{{ $f->Deskripsi }}</p>
                                            
                                            </div>
                                            <div class="card-body"> 
                                                <p class="card-text"></p>
                                                <p class="card-text">{{ $f->name }} <small class="text-muted">{{ date("Y-m-d", strtotime($f->created_at)) }}</small></p>
                                            </div>
                                        </div>
                                </div>
                                <div class="card-footer">
                                <a href="/ForumDetail/{{ $f->id }}" class="btn btn-warning btn-sm">Comment</a>
                                <a href="" class="btn btn-warning btn-sm">Delete</a>
                                </div>
                            </div>
                            @endforeach
                            {{ $forum->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </body>

    </html>
@endsection
