@extends('layouts.layoutsKelurahan')

@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>ForumDetail</title>
        <style>
            .card {
                background-color: lightblue;
                color: black;
            }
            .card-title{
                 font-size: 25px;
                }
            .card-text{
                font-size: 20px;
                }
        </style>
    </head>

    <body>
    <div class="row align-items-start">
            <a href="/admin-forum" class="float-left">
                <img src="{{ asset("css/foto/KEMBALI.png") }}" style="width: 15%;height:15%;">
            </a>
        </div>
        <div class="container">
            <div class="col-md-1">
                @if (Session::has('sukes'))
                    <p class="text-success">{{ session('sukes') }}</p>
                @endif
            </div>
            <div class="card w-90">
                <div class="card-body">
                    <img src="{{ asset("css/foto/$ForumDetail->gambar") }}" alt="" srcset="">
                    <h4 class="card-title"> {{ $ForumDetail->Judul }} </h4>
                    <h3 class="card-text"> {{ $ForumDetail->Deskripsi }} </h3>
                    <p class="card-text"> Created by: {{ $ForumDetail->name }} </p>
                </div>
            </div>
            <!-- {{-- <div class="card my-5">
                    <h5 class="card-header">Add Comment</h5>
                    <div class="card-body">
                        <form method="post"
                            action="{{ url('save-comment/' . Str::slug($ForumDetail->Judul) . '/' . $ForumDetail->id) }}">
                            @csrf
                            <textarea name="comment" class="form-control"></textarea>
                            <input type="submit" class="btn btn-dark mt-2" />
                    </div>

                </div> --}} -->

            <div class="card my-5">
                <h5 class="card-header">Add Comment</h5>
                <div class="card-body">
                    @guest
                        <textarea class="form-control"></textarea>
                        <a href="{{ url('login') }}" class="btn btn-dark mt-2">Submit</a>
                    @else
                        <form method="post"
                            action="{{ url('save-comment-kelurahan/' . Str::slug($ForumDetail->Judul) . '/' . $ForumDetail->id) }}">
                            @csrf
                            <textarea name="comment" class="form-control"></textarea>
                            <button type="submit" class="btn btn-dark mt-2">Submit</button>
                        @endguest
                        <!-- {{-- <form method="post"
                            action="{{ url('save-comment/' . Str::slug($ForumDetail->Judul) . '/' . $ForumDetail->id) }}">
                            @csrf
                            <textarea name="comment" class="form-control"></textarea>
                            <input type="submit" class="btn btn-dark mt-2" /> --}}       -->
                </div>
            </div>
            <p><strong>Latest Comments</strong></p>
            @foreach ($data as $k)
                <p class="colour-text card-text float-right">{{ date('d-m-Y H:i', strtotime($k->created_at)) }}</p>
                </p>
                <p class="card-title"><strong>{{ $k->name }}</strong></p>
                <p class="card-text">{{ $k->Komentar }}</p>
                <hr>
            @endforeach



        </div>
    </body>

    </html>
@endsection
