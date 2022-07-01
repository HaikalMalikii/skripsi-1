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
            .image {
                width: 25%;
                height: 25%;
            }
        </style>
    </head>

    <body>
    <div class="">
            <a href="/AduanViewUser" class="float-left">Kembali</a>
    </div>
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
                        @foreach ($images as $imagets)
                            <div>   
                                    
                                    <img src="{{ URL::to($imagets) }}" class="image" alt=""> 
                                    <br>
                                    <br>
                            </div>
                        @endforeach
                        
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
