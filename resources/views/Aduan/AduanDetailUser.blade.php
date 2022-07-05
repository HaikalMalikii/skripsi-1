@extends('layouts.app')

@section('content')
    <!DOCTYPE html>
    <html lang="en">

    
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="{{ asset('css/home.css') }}">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">


        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <title>Detail Aduan</title>
        <style>
                .images{
                    width:100%;
                    height:100%;
                }
                .card-title{
                    font-size: 30px;
                }
                .card-text{
                    font-size: 20px;
                }
        </style>
    </head>

    <body>
    <div class="row align-items-start">
            <a href="/AduanViewUser" class="float-left">
                <img src="{{ asset("css/foto/KEMBALI.png") }}" style="width: 15%;height:15%;">
            </a>
        </div>
        <div class="main">
        <div class="container">
            <div class="col-md-1">
                @if (Session::has('sukes'))
                    <p class="text-success">{{ session('sukes') }}</p>
                @endif
            </div>
            <div class="card w-90">
                <div class="card-body">
                    @foreach ($AduanDetail as $a)
                    <h4 class="card-title"> {{ $a->Judul }} </h4>

                        <!-- <h4 class="card-reader">Oleh : {{ $a->name }} </h4> -->
                        <div class="row">
                            @foreach ($images as $imagets)
                                <div class="col-md-4">
                                     <img src="{{ URL::to($imagets) }}" class="images img-fluid" alt=""> 
                            </div>
                            @endforeach
                            </div>
                        
                        <p class="card-text"> {{ $a->Deskripsi }} </p>
                        <p class="card-text">Status : Diproses</p>
                </div>
                @endforeach
            </div>
        </div>
        </div>

    </body>

    </html>
@endsection
