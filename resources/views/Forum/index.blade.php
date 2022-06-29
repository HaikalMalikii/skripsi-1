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

        <link rel="stylesheet" href="sweetalert2.min.css">
        <title>Add Forum</title>
        <style>
            .card-title:hover {
                text-decoration: none;
                color: #242F9B;
            }

            p {
                color: black;
            }

            .card {
                background-color: lightblue;
                padding-top: 20px;
            }

            .image {
                width: 100%;
                height: 100%;
            }

            .form {
                padding-left: 20px;
                color: black;
            }

            .BackColour {
                background-color: lightblue;
                text-decoration-color: white;
            }
        </style>
    </head>

    <body>

        @if ($errors->any())
            <div id="ERROR_COPY" style="display:none;" class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="tab-content">

            <a href="/" class="previous">
            <button class="btn btn-sm btn-secondary">Kembali</button>
            </a>
                
        </div>

        <form action="/AddnewForum" method="post" enctype="multipart/form-data">
            @csrf
            <div class="container">
                <div class="form card w-90">
                    <div class="form-row">
                        <div class="col-10">
                            <div class="form-group">
                                <label for="judul">Judul: </label>
                                <input type="text" class="form-control" id="AddAduanJudulID" name="Judul"
                                    placeholder="Judul">
                            </div>
                            <div class="form-group">
                                <label for="deskripsi">Deskripsi:</label>
                                <textarea class="form-control" id="forumaspirasi" placeholder="Deskripsi" name="Deskripsi"></textarea>
                            </div>

                            <div class="form-group">
                                <label for="gambar">Gambar:</label>
                                <input type="file" class="form-control-file" id="imageforumaddid" name="Gambar">
                            </div>

                            <div class="form-group form-row justify-content-left">
                                @guest
                                    <a href="{{ url('login') }}" class="btn btn-sm btn-primary">Submit Forum</a>
                                @else
                                    <button type="submit" name="buttonadd" class="btn btn-primary">Submit Forum</button>
                                    {{-- <button type="submit" name="buttonadd" data-toggle="modal" data-target="#popup"
                                        class="btn btn-primary">Submit Forum</button> --}}
                                @endguest
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- <div class="modal fade" id="popup" role="dialog" arialabelledby="modalLabel" area-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">
                                FORUM</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <h3 class="text-danger">Forum berhasil di tambahkan</h3>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">OK</button>
                        </div>
                    </div>
                </div>
            </div> --}}
        </form>
        <br>
        <div class="main">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel">
                            <div class="panel-heading">
                                <div class="right">
                                </div>
                            </div>
                            {{-- @if (Session::has('success'))
                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                    <strong>Forum Berhasil Ditambahkan!</strong>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif --}}
                            @foreach ($forum as $f)
                                <div class="card w-90">
                                    <div class="row no-gutters">
                                        <div class="col-md-2">
                                            <img class="image" src="{{ asset("css/foto/$f->Gambar") }}" alt=""
                                                srcset="">
                                        </div>
                                        <div class="col-md-8">
                                            <div class="card-body">
                                                <a class="card-title"
                                                    href="/ForumDetail/{{ $f->id }}"><strong>{{ $f->Judul }}</strong></a>
                                                <p class="card-text">{{ $f->name }} <small
                                                        class="text-muted">{{ date('d-m-Y', strtotime($f->created_at)) }}</small>
                                                </p>
                                                <p class="card-text">
                                                    {{ Illuminate\Support\Str::limit($f->Deskripsi, 300) }}</p>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <a href="/ForumDetail/{{ $f->id }}"
                                            class="btn btn-warning btn-sm">Comment</a>
                                    </div>
                                </div>
                            @endforeach
                            {{ $forum->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('sweetalert::alert')
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="sweetalert2.min.js"></script>

    </body>

    </html>
@endsection
