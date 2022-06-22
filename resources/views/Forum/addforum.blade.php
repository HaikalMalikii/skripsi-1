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
        .container{
            background-color: lightblue;
            padding-top: 20px;

        }
    </style>
</head>


<body>
    <div class="text-xl-center">
        <strong>
            <p class="addforum">Form Forum Masyarakat</p>
        </strong>

    </div>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="/AddnewForum" method="post" enctype="multipart/form-data">
        @csrf
        <div class="container ">
        <div class="form-row">
            <div class="col-4">
                <div class="form-group">
                    <div class="row">
                        <div class="col">
                            <input type="text" class="form-control" id="AddAduanJudulID" name="Judul" placeholder="Judul">
                        </div>
                    </div>
                </div>
            </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-1">
                            <textarea id="forumaspirasi"  placeholder="Deskripsi" name="Deskripsi"rows="4" cols="50" ></textarea>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col">
                            <label for="exampleGroupExampleInput">Gambar</label>
                        </div>
                        <div>
                            <input type="file" class="form-control-file" id="imageforumaddid" name="Gambar">
                            
                        </div>
                    </div>
                </div>

                <div class="form-group form-row justify-content-center">
                    <button type="submit" name="buttonadd" class="btn btn-primary">Submit Forum</button>
                </div>

            </div>
        </div>
    </form>
</body>
@endsection
