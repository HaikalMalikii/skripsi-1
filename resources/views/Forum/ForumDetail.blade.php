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
            .card{
                background-color: lightblue;
                color: black;
            }

        </style>
    </head>

    <body>
        <div class="container">
            <div class="col-md-1">
                @if (Session::has('sukes'))
                    <p class="text-success">{{ session('sukes') }}</p>
                @endif
            </div>
            <div class="card w-90">
                <div class="card-body">
                    <img src="{{ asset("css/foto/$ForumDetail->gambar") }}" alt="" srcset="">
                    <h4 class="card-reader"> {{ $ForumDetail->Judul }} </h4>
                    <h3 class="card-reader"> {{ $ForumDetail->Deskripsi }} </h3>
                    <p class="card-reader"> Created by: {{ $ForumDetail->name }} </p>
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
                                action="{{ url('save-comment/' . Str::slug($ForumDetail->Judul) . '/' . $ForumDetail->id) }}">
                                @csrf
                                <textarea name="comment" class="form-control"></textarea>
                                <input type="submit" class="btn btn-dark mt-2" />
                            @endguest
                            <!-- {{-- <form method="post"
                            action="{{ url('save-comment/' . Str::slug($ForumDetail->Judul) . '/' . $ForumDetail->id) }}">
                            @csrf
                            <textarea name="comment" class="form-control"></textarea>
                            <input type="submit" class="btn btn-dark mt-2" /> --}}       -->
                    </div>
                </div>
                <p><strong>Comments</strong></p>
                @foreach ($data as $k)
                <p class="colour-text card-text">{{ date("Y-m-d H:i:s", strtotime($k->created_at)) }}</p>
                    </p>
                    <p class="card-title"><strong>{{ $k->name }}</strong></p>
                    <p class="card-text">{{ $k->Komentar }}</p>
                    
                @endforeach
            


        </div>
    </body>

    </html>
@endsection
