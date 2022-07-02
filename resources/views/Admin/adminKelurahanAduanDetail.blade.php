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
                .img{
                    width:25%;
                    height:25%;
                }
                .card-title{
                    font-size: 30px;
                }
                .card-text{
                    font-size: 20px;
                }
        </style>
        <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">

    </head>

    <body>
    <div class="">

        </div>
        <div class="container">
            <div class="col-md-1">
                @if (Session::has('sukes'))
                    <p class="text-success">{{ session('sukes') }}</p>
                @endif
            </div>
            <div class="card w-90">
                <div class="card-body">
                    @foreach ($AduanDetail as $AduanDetail)
                        <h4 class="card-text">Oleh : {{ $AduanDetail->name }} </h4>
                        <img class="img" src="{{ asset("css/foto/$AduanDetail->Gambar") }}" alt="" srcset="">
                        <h4 class="card-title"> {{ $AduanDetail->Judul }} </h4>
                        <p class="card-text"> {{ $AduanDetail->Deskripsi }} </p>


                        {{-- <form action="/Status/{{ $AduanDetail->id }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <button type="submit" name="status" value="Reject" class="btn btn-primary">Reject
                            </button>
                            <button type="submit" name="status" value="Approve" class="btn btn-primary">Approve
                            </button>
                            {{-- <button type="submit" name="status" value="Pending" class="btn btn-primary">Pending </button> --}}
                        {{-- </form>? --}}


                </div>
                @endforeach

                {{-- <div class="card my-5">
                    <h5 class="card-header">Add Comment</h5>
                    <div class="card-body">
                        <form method="post"
                            action="{{ url('save-comment/' . Str::slug($ForumDetail->Judul) . '/' . $ForumDetail->id) }}">
                            @csrf
                            <textarea name="comment" class="form-control"></textarea>
                            <input type="submit" class="btn btn-dark mt-2" />
                    </div>

                </div> --}}

            </div>


        </div>
    </body>

    </html>
@endsection
