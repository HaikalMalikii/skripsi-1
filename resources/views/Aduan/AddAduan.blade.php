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


        <title>Pengaduan Masyarakat</title>
        <style>
            .container {
                background-color: lightblue;
                padding: 20px;
            }
        </style>
    </head>



    <div class="text-xl-center">
        <strong>
            <h4 class="AddAduan">Form Pengaduan Masyarakat</h4>
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
    <a href="/BacktoAduanViewUser">Kembali</a>
    <form action="/AddAduan" method="post" enctype="multipart/form-data">
        @csrf
        <div class="container">
            <div class="form-row col  justify-content-center">
                <div class="col-6">
                    <div class="form-group">
                        <label for="judul">Judul: </label>
                        <input type="text" class="form-control" id="AddAduanJudulID" name="Judul" placeholder="Judul">
                    </div>

                    <div class="form-group">
                        <label for="judul">Bagian: </label>
                        <select name="Bagian" id="AddAduanBagianID" class="form-control select2">
                            <option selected>Bagian...</option>
                            <option value="Kebersihan"> Kebersihan</option>
                            <option value="Kesehatan"> Kesehatan</option>
                            <option value="Fasilitas Publik"> Fasilitas Publik</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="lokasi">Alamat: </label>
                        <input type="text" class="form-control" id="LokasiID" name="Location" placeholder="lokasi">
                    </div>
                    <div class="form-group">
                        <label for="deskripsi">Deskripsi:</label>
                        <textarea class="form-control" id="comment" placeholder="Deskripsi" name="Deskripsi"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="Gambar">Gambar</label>

                        <input type="file" class="form-control-file" id="AddAduanGambarID" name="Gambar">
                    </div>

                    <div class="form-group form-row"><a></a>
                        <button type="submit" name="buttonadd" class="btn btn-primary">Submit Aduan</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- <div class="d-flex justify-content-center backgroundorder">
                    <div class="mt-5 col-4">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-4">
                                    <label for="formGroupExampleInput">Judul</label>
                                </div>
                                <div class="col">
                                    <input type="text" class="form-control" id="AddAduanJudulID" name="AddAduanJudul">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-4">
                                    <label for="formGroupExampleInput">Bagian</label>
                                </div>
                                <div class="col-8">
                                    <select name="AddAduanBagian" id="AddAduanBagianID" class="form-control select2">
                                        <option value ="Kebersihan"> Kebersihan</option>
                                        <option value ="Kesehatan"> Kesehatan</option>
                                    </select>
                                </div>
                            </div>
                        </div> -->



        <!-- <div class="form-group">
                            <div class="row">
                                <div class="col-4">
                                    <label for="formGroupExampleInput">Deskripsi</label>
                                </div>
                                <div class="col-1">
                                    <textarea id="AddAduanDeskripsiID" name="AddAduanDeskripsi"rows="4" cols="50"></textarea>
                                </div>
                            </div>
                        </div> -->

        <!-- <div class="form-group">
                            <div class="row">
                                <div class="col">
                                    <label for="exampleGroupExampleInput">Gambar</label>
                                </div>
                                <div>
                                    <input type="file" class="form-control-file" id="AddAduanGambarID" name="AddAduanGambar">
                                </div>
                            </div>
                        </div>

                        <div class="form-group form-row justify-content-center">
                            <button type="submit" name="buttonadd" class="btn btn-primary">Submit Aduan</button>
                        </div>
                    </div>
                </div> -->
    </form>
@endsection
