@extends('layouts.app')

@section('content')
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet"  href="{{asset('css/home.css')}}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="{{asset('css/app.css')}}">

    <title>Add Forum</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto+Condensed&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Roboto+Condensed&family=Roboto+Mono:ital,wght@0,400;1,500&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Roboto+Condensed&family=Roboto+Mono:ital,wght@0,400;1,500&display=swap');
        h3{
            font-family: 'Bebas Neue', cursive;
        }
        .btn{
        background-color: #FFE3A9;
        color: black;
        border-color: blue;
        border-width: 2px;
        font-family: 'Roboto Mono', monospace;
    }
    th{
        font-family: 'Roboto Condensed', sans-serif;
    }
    </style>
</head>

<body>
<div class="main">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">Forum Masyarkat</h3>
                        <div class="right">
                            <a href="{{ url('/addforum') }}" class="btn btn-sm btn-primary">New Forum</a>
                        </div>
                    </div>

                    <div class="panel-body">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Tanggal</th>
                                    <th>Title</th>
                                    <th>Aspirasi</th>
                                    <th>Photo</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($forum as $frm )

                                    <td>{{ $frm->id }}</td>


                                    <td>
                                        <a href="/ForumDetail/{{$frm->id}}">
                                            {{ $frm->Title }}
                                        </a>
                                    </td>
                                    <td>{{ $frm->Aspirasi }}</td>
                                    <td>{{ $frm->total }}</td>
                                    {{-- <td>{{ $frm->use }}</td> --}}
                                    <td>
                                        <a target="_blank" class="btn btn-warning btn-sm">Comment</a>
                                        <a href="#" class="btn btn-warning btn-sm">View </a>
                                        <a href="#" class="btn btn-danger btn-sm delete">Dislike </a>
                                    </td>
                                @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>



@endsection

