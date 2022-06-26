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

            th {
                font-family: 'Roboto Condensed', sans-serif;
            }
            .setuju{
                background-color: #5FD068;
            }
            a{
                font-size: 20px;
                color: black;
            }
            .tolak{
                background-color: #F24C4C;
            }
            .proses{
                background-color: #FFB562;
            }
            .waiting{
                background-color: #FFB562;
            }
            .judul:hover{
                text-decoration: none;
            }
        </style>
    </head>

    <body>
        <div class="main">
            <div class="container">
            <div class="dropdown float-right">
                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Sort By
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="#">Status</a>
                                    <a class="dropdown-item" href="#">Date</a>
                                    <a class="dropdown-item" href="#">Bagian</a>
                                </div>
                    </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel">
                            <div class="panel-heading">
                                <h4 class="panel-title text-center">STATUS ADUAN</h4>
                                <div class="form-group form-row justify-content-left">
                                    @guest
                                        <a href="{{ url('login') }}" class="btn btn-sm btn-primary">Add New Adyan</a>
                                    @else
                                        <a href="{{ url('/AddAduan') }}" class="btn btn-sm btn-primary">Add New Aduan</a>
                                    @endguest
                        </div>
                            </div>

                            @foreach ($data as $f)
                            @if ($f->Persetujuan == 1)
                                <div class="setuju card w-90">
                                    <div class="card-body"> 
                                    <div class="card-title"><a class="judul" href="/AduanDetailUser/{{ $f->id }}">{{ $f->Judul }}</a></div>
                                        <!-- <p class="colour-text card-text">{{ Auth::user()->name }}</p> -->
                                        <!-- <p class="colour-text card-text">{{ $f->Bagian }}</p>
                                        <p class="colour-text card-text">{{ $f->Gambar }}</p>
                                       <p class="colour-text card-text">{{ $f->Deskripsi }}</p> -->
                                       <p class="colour-text card-text">Status : Diproses</p>
                                        <!-- <img src="{{ asset("css/foto/$f->Gambar") }}" alt="" srcset=""> -->
                                        <p class="colour-text card-text"><small class="text-muted"> {{ $f -> created_at ->format('d/m/Y') }}</small></p>
                                    </div>
                                    <div class="card-footer">
                                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteAduan{{ $f->id }}">Delete</button>    
                                    </div>
                                </div>   
                            @elseif ($f->Persetujuan == 2)
                                <div class="tolak card w-90">
                                    <div class="card-body"> 
                                        <div class="card-title"><a class="judul" href="/AduanDetailUser/{{ $f->id }}">{{ $f->Judul }}</a></div>
                                        <!-- <p class="colour-text card-text">{{ Auth::user()->name }}</p> -->
                                        <!-- <p class="colour-text card-text">{{ $f->Bagian }}</p> -->
                                        <!-- <p class="colour-text card-text">{{ $f->Gambar }}</p> -->
                                       <!-- <p class="colour-text card-text">{{ $f->Deskripsi }}</p> -->
                                       <p class="colour-text card-text">Status : Ditolak</p>
                                        <!-- <img src="{{ asset("css/foto/$f->Gambar") }}" alt="" srcset=""> -->
                                        <p class="colour-text card-text"><small class="text-muted"> {{ $f -> created_at ->format('d/m/Y') }}</small></p>
                                    </div>
                                    <div class="card-footer">
                                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteAduan{{ $f->id }}">Delete</button>        
                                    </div>
                                </div>   
                            @elseif ($f->Persetujuan == 3)
                                <div class="proses card w-90">
                                    <div class="card-body"> 
                                        <div class="card-title"><a class="judul" href="/AduanDetailUser/{{ $f->id }}">{{ $f->Judul }}</a></div>
                                        <!-- <p class="colour-text card-text">{{ Auth::user()->name }}</p> -->
                                        <!-- <p class="colour-text card-text">{{ $f->Bagian }}</p> -->
                                        <!-- <p class="colour-text card-text">{{ $f->Gambar }}</p> -->
                                       <!-- <p class="colour-text card-text">{{ $f->Deskripsi }}</p> -->
                                       <p class="colour-text card-text">Status : Diproses</p>
                                        <!-- <img src="{{ asset("css/foto/$f->Gambar") }}" alt="" srcset=""> -->
                                        <p class="colour-text card-text"><small class="text-muted"> {{ $f -> created_at ->format('d/m/Y') }}</small></p>
                                    </div>
                                    <div class="card-footer">
                                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteAduan{{ $f->id }}">Delete</button>            
                                    </div>
                                </div> 
                            @else  
                            <div class="waiting card w-90">
                                    <div class="card-body">
                                        <div class="card-title"><a class="judul" href="/AduanDetailUser/{{ $f->id }}">{{ $f->Judul }}</a></div> 
                                        <!-- <p class="colour-text card-text">{{ Auth::user()->name }}</p> -->
                                        <!-- <p class="colour-text card-text">{{ $f->Bagian }}</p> -->
                                        <!-- <p class="colour-text card-text">{{ $f->Gambar }}</p> -->
                                       <!-- <p class="colour-text card-text">{{ $f->Deskripsi }}</p> -->
                                       <p class="colour-text card-text">Status : Waiting</p>
                                        <!-- <img src="{{ asset("css/foto/$f->Gambar") }}" alt="" srcset=""> -->
                                        <p class="colour-text card-text"><small class="text-muted"> {{ $f -> created_at ->format('d/m/Y') }}</small></p>
                                    </div>
                                    <div class="card-footer">
                                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteAduan{{ $f->id }}">Delete</button>            
                                    </div>
                                </div> 
                            @endif
                            @endforeach
                            {{ $data->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </body>

    </html>
@endsection
