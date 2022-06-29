@extends('layouts.layoutsKelurahan')

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
        <!-- <div style="">
            <div class="bg-light clearfix">
                <a href="/Admin.dashboardAdminKelurahan" type="button" class="btn float-right">Kembali</a>
            </div>
        </div> -->
    </head>


    <body>
        <div class="">
            <a href="/" class="float-left">Kembali</a>
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
                                                    href="/forum-admin-kelurahan/{{ $f->id }}"><strong>{{ $f->Judul }}</strong></a>
                                                <p class="card-text">{{ $f->name }} <small
                                                        class="text-muted">{{ date('d-m-Y', strtotime($f->created_at)) }}</small>
                                                </p>
                                                <p class="card-text">
                                                    {{ Illuminate\Support\Str::limit($f->Deskripsi, 300) }}</p>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <a href="/forum-admin-kelurahan/{{ $f->id }}"
                                            class="btn btn-warning btn-sm">Comment</a>
                                    </div>
                                    @if ($f->IDUser == Auth::user()->id)
                                        <div class="card-footer">
                                            <button type="button" class="btn btn-danger" data-toggle="modal"
                                                data-target="#deleteForum{{ $f->IDForum }}">Delete Forum</button>
                                        </div>

                                        <div class="modal fade" id="deleteForum{{ $f->IDForum }}" tabindex="-1"
                                            aria-labelledby="deleteForumLabel{{ $f->IDForum }}Label" aria-hidden="true">
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
                                                        <h3 class="text-danger">Apakah anda yakin ingin menghapus Forum ini
                                                            "{{ $f->Judul }}"?</h3>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Close</button>
                                                        <a href="/user-delete-forum/{{ $f->IDForum }}"
                                                            class="btn btn-danger">Hapus
                                                            Forum</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
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
