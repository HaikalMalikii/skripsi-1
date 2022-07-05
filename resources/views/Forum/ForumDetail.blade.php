@extends('layouts.app')

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
        </style>

    </head>

    <body>
    <div class="row align-items-start">
            <a href="/forum" class="float-left">
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
                    <h4 class="card-reader text-capitalize"> {{ $ForumDetail->Judul }} </h4>
                    <p class="card-text"> {{ $ForumDetail->Deskripsi }} </p>
                    <p class="card-text  text-capitalize">{{ $ForumDetail->name }} | <small>{{ date('Y-m-d', strtotime($ForumDetail->created_at)) }}</small>
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
                <h5 class="card-header">Komentar</h5>
                <div class="card-body">
                    @guest
                        <textarea class="form-control"></textarea>
                        <a href="{{ url('login') }}" class="btn btn-dark mt-2">Tambahkan Komentar</a>
                    @else
                        <form method="post"
                            action="{{ url('save-comment/' . Str::slug($ForumDetail->Judul) . '/' . $ForumDetail->id) }}">
                            @csrf
                            <textarea name="comment" class="form-control"></textarea>
                            <button type="submit" class="btn btn-dark mt-2">Tambahkan Komentar</button>
                        @endguest
                        <!-- {{-- <form method="post"
                            action="{{ url('save-comment/' . Str::slug($ForumDetail->Judul) . '/' . $ForumDetail->id) }}">
                            @csrf
                            <textarea name="comment" class="form-control"></textarea>
                            <input type="submit" class="btn btn-dark mt-2" /> --}}       -->
                </div>
            </div>
            <p><strong>Komentar Masyarakat</strong></p>
            <hr>
            @foreach ($data as $k)
                <p class="colour-text card-text float-right">{{ date('d-m-Y H:i', strtotime($k->created_at)) }}</p>
                </p>
                <p class="card-title text-capitalize"><strong>{{ $k->name }}</strong></p>
                <p class="card-text">{{ $k->Komentar }}</p>
                <hr>
            @endforeach



        </div>
    </body>

    </html>
@endsection
