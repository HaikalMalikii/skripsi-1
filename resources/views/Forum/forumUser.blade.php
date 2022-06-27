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
            .card-title:hover {
                text-decoration: none;
                color: #242F9B;
            }

            .btn {
                background-color: #FFE3A9;
                color: black;
                border-color: grey;
                border-width: 2px;
                border-radius: 10px;
                font-family: 'Roboto Mono', monospace;
            }

            th {
                font-family: 'Roboto Condensed', sans-serif;
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
        </style>
    </head>

    <body>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="main">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel">
                            <div class="panel-heading">
                                <div class="right">
                                </div>
                            </div>
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
                                                <p class="card-text">{{ $f->Deskripsi }}</p>

                                            </div>
                                            <div class="card-body">
                                                <p class="card-text"></p>
                                                <p class="card-text">{{ $f->name }} <small
                                                        class="text-muted">{{ date('Y-m-d', strtotime($f->created_at)) }}</small>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <a href="/ForumDetail/{{ $f->id }}"
                                            class="btn btn-warning btn-sm">Comment</a>

                                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                                            data-target="#updateForum{{ $f->id }}">
                                            Edit Forum
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade bd-example-modal-xl" id="updateForum{{ $f->id }}"
                                            tabindex="-1" aria-labelledby="updateForumLabel{{ $f->id }}Label"
                                            aria-hidden="true">
                                            <div class="modal-dialog modal-xl">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title"
                                                            id="updateForumLabel{{ $f->id }}Label">
                                                            Judul Forum {{ $f->Judul }}</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="/user-edit-forum/{{ $f->id }}" method="POST"
                                                            enctype="multipart/form-data">
                                                            @csrf
                                                            <div class="form-group">
                                                                <label for="judul">Judul Forum</label>
                                                                <input placeholder="Judul" id="judul" type="text"
                                                                    class="form-control @error('judul') is-invalid @enderror"
                                                                    name="judul" value="{{ $f->Judul }}" required
                                                                    autocomplete="judul" autofocus>

                                                                @error('judul')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="description">Deskripsi Forum</label>
                                                                <textarea placeholder="Description" class="form-control @error('description') is-invalid @enderror" name="description"
                                                                    id="" cols="30" rows="5" required autocomplete="description" autofocus>{{ $f->Deskripsi }}</textarea>

                                                                @error('description')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="image">Gambar</label>
                                                                <input placeholder="Image" id="image" type="file"
                                                                    class="form-control-file @error('image') is-invalid @enderror"
                                                                    name="image">

                                                                @error('image')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Update
                                                            Forum</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                            data-target="#deleteForum{{ $f->IDForum }}">Delete Forum</button>


                                        <div class="modal fade" id="deleteForum{{ $f->IDForum }}" tabindex="-1"
                                            aria-labelledby="deleteForumLabel{{ $f->IDForum }}Label"
                                            aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title"
                                                            id="deleteForumLabel{{ $f->IDForum }}Label">
                                                            "{{ $f->Judul }}"</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <h3 class="text-danger">Apakah anda yakin ingin menghapus Forum
                                                            ini
                                                            "{{ $f->Judul }}"?</h3>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Close</button>
                                                        <a href="/user-delete-forum/{{ $f->IDForum }}"
                                                            class="btn btn-danger">Hapus Forum</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            @endforeach
                            {{ $forum->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </body>

    </html>
@endsection
