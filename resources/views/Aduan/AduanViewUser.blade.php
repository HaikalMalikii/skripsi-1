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

            .setuju {
                background-color: #5FD068;
            }

            .judul {
                font-size: 20px;
                color: black;
            }

            .tolak {
                background-color: #F24C4C;
            }

            .waiting {
                background-color: #FFB562;
            }

            .judul:hover {
                text-decoration: none;
            }
            .previous {
            background-color: #f1f1f1;
            color: black;
            }
        </style>
    </head>

    <body>
        <div class="main">
            <div class="container">
                <div class="tab-content">

                    <a href="/" class="previous">
                    <button class="btn btn-sm btn-secondary">Kembali</button>
                    </a>
                        
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel">
                            <div class="panel-heading">
                                <h4 class="panel-title text-center">STATUS ADUAN ANDA </h4>
                                <div class="form-group form-row justify-content-left">
                                    @guest
                                        <a href="{{ url('login') }}" class="btn btn-sm btn-primary">Add New Aduan</a>
                                    @else
                                        <a href="{{ url('/AddAduan') }}" class="btn btn-sm btn-primary">Add New Aduan</a>
                                    @endguest
                                </div>
                                {{-- <div class="bg-light clearfix">

                                    <button type="button" class="btn btn-warning float-right">Save</button>
                                    <button type="button" class="btn btn-primary float-right">Cancel</button>
                                </div>
                                <a href="/">Kembali</a> --}}

                                {{-- @if (Session::has('success'))
                                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                        <strong>Aduan Ditambahkan!</strong>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                @endif --}}
                            </div>

                            @foreach ($data as $f)
                                @if ($f->Persetujuan == 1)
                                    <div class="setuju card w-90">
                                        <div class="card-body">
                                            <div class="card-title"><a class="judul"
                                                    href="/AduanDetailUser/{{ $f->id }}">{{ $f->Judul }}</a>
                                            </div>
                                            <p class="colour-text card-text">Status : Diterima</p>
                                            <p class="colour-text card-text"><small class="text-muted">
                                                    {{ date('d-m-Y', strtotime($f->created_at)) }}</small></p>
                                        </div>

                                    </div>
                                @elseif ($f->Persetujuan == 2)
                                    <div class="tolak card w-90">
                                        <div class="card-body">
                                            <div class="card-title"><a class="judul"
                                                    href="/AduanDetailUser/{{ $f->id }}">{{ $f->Judul }}</a>
                                            </div>
                                            <p class="colour-text card-text">Status : Ditolak</p>
                                            <p class="colour-text card-text"><small class="text-muted">
                                                    {{ date('d-m-Y', strtotime($f->created_at)) }}</small></p>
                                        </div>
                                    </div>
                                @else
                                    <div class="waiting card w-90">
                                        <div class="card-body">
                                            <div class="card-title"><a class="judul"
                                                    href="/AduanDetailUser/{{ $f->id }}">{{ $f->Judul }}</a>
                                            </div>
                                            <p class="colour-text card-text">Status : Waiting</p>
                                            <p class="colour-text card-text"><small class="text-muted">
                                                    {{ date('d-m-Y', strtotime($f->created_at)) }}</small></p>
                                        </div>

                                        <div class="card-footer">

                                            <button type="button" class="btn btn-danger float-right" data-toggle="modal"
                                                data-target="#deleteAduan{{ $f->id }}">Delete</button>

                                        </div>
                                    </div>
                                @endif
                                <div class="modal fade" id="deleteAduan{{ $f->id }}" tabindex="-1"
                                    aria-labelledby="deleteAduanLabel{{ $f->id }}Label" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="deleteAduanLabel{{ $f->id }}Label">
                                                    Hapus Aduan</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <h3 class="text-danger">Apakah anda yakin ingin menghapus aduan ini
                                                    "{{ $f->Judul }}"?</h3>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Close</button>
                                                <a href="/user-delete-aduan/{{ $f->id }}"
                                                    class="btn btn-danger">Hapus
                                                    Aduan</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            {{ $data->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </body>
    @include('sweetalert::alert')

    </html>
@endsection
