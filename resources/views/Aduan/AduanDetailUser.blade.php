@extends('layouts.app')

@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>ForumDetail</title>
        <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">

        <style>

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
                    @foreach ($AduanDetail as $a)
                        <!-- <h4 class="card-reader">Oleh : {{ $a->name }} </h4> -->
                        <img src="{{ asset("css/foto/$a->Gambar") }}" alt="" srcset="">
                        <h4 class="card-reader"> {{ $a->Judul }} </h4>
                        <p class="card-reader"> {{ $a->Deskripsi }} </p>
                        <p class="colour-text card-text">Status : Diproses</p>
                </div>
                @endforeach
            </div>
        </div>
    </body>

    </html>
@endsection
