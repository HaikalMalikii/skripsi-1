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

    <title>Add Pizza</title>
</head>



<div class="form-row align-text-left">
    <strong>
        <p class="addpizzaname">Add Forum</p>
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
    <div class="d-flex justify-content-center backgroundorder">
        <div class="mt-5 col-4">
            <div class="form-group">
                <div class="row">
                    <div class="col-4">
                        <label for="formGroupExampleInput">Ganteng</label>
                    </div>
                    <div class="col">
                        <input type="text" class="form-control" id="forumjuduladdid" name="forumjuduladd">
                    </div>
                </div>

            </div>
            {{-- <div class="form-group">
                <div class="row">
                    <div class="col-4">
                        <label for="formGroupExampleInput">Pizza Price</label>
                    </div>
                    <div class="col">
                        <input type="number" class="form-control" id="pizzapricenew" name="pizzapriceadd">
                    </div>
                </div>

            </div> --}}
            <div class="form-group">
                <div class="row">
                    <div class="col-4">
                        <label for="formGroupExampleInput">Aspirasi</label>
                    </div>
                    <div class="col-1">
                        <textarea id="forumaspirasi" name="aspirasi"rows="4" cols="50" ></textarea>
                    </div>
                </div>


            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col">
                        <label for="exampleGroupExampleInput">File Tambahan</label>
                    </div>
                    <div class="col">
                        <input type="file" class="form-control-file" id="imageforumaddid" name="imageforumadd">
                    </div>
                </div>

            </div>
            <div class="form-group form-row justify-content-center">
                <button type="submit" name="buttonadd" class="btn btn-primary">Add Forum</button>
            </div>
        </div>
    </div>
</form>
@endsection
