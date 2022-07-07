@extends('layouts.layoutsInstansi')

@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>ForumDetail</title>
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
                .image {
                width: 25%;
                height: 25%;
                }
        </style>
        <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
    </head>

    <body>
    <div class="row align-items-start">
            <a href="/Aduan" class="float-left">
                <img src="{{ asset("css/foto/KEMBALI.png") }}" style="width: 15%;height:15%;">
            </a>
        </div>
        <div class="container">
            <div class="col-md-1">
                @if (Session::has('sukes'))
                    <p class="text-success">{{ session('sukes') }}</p>
                @endif
            </div>
            <div class="card w-90">
                <div class="card-body">
                    @foreach ($AduanDetail as $AduanDetail)
                        <h4 class="card-text">Oleh : {{ $AduanDetail->name }} </h4>

                        
                            <div class="row">
                            @foreach ($images as $imagets)
                            <br>   
                                <div class="col-md-4">
                                     <img src="{{ URL::to($imagets) }}" class="images img-fluid" alt="">
                                     <br> 
                                    </div>
                            @endforeach
                            </div>
                            <br> 
                            
                        <h4 class="card-title"> {{ $AduanDetail->Judul }} </h4>
                        <p class="card-text"> {{ $AduanDetail->Deskripsi }} </p>

                        @if ($AduanDetail->Persetujuan == 0)

                                
                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                data-target="#ApproveAduan{{ $AduanDetail->id }}">Terima Aduan</button>


                                {{-- Modal Terima --}}

                                <div class="modal fade bd-example-modal-xl" id="ApproveAduan{{ $AduanDetail->id }}"
                                    tabindex="-1" aria-labelledby="ApproveAduanLabel{{ $AduanDetail->id }}Label"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-xl">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title"
                                                    id="ApproveAduanLabel{{ $AduanDetail->id }}Label">
                                                    Terima Aduan</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="/Status/{{ $AduanDetail->id }}" method="POST"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="form-group">
                                                        <label for="judul">Judul Forum</label>
                                                        <input placeholder="Judul" id="judul" type="text"
                                                            class="form-control @error('judul') is-invalid @enderror"
                                                            name="judul" value="{{ $AduanDetail->Judul }}" required
                                                            autocomplete="judul" autofocus>

                                                        @error('judul')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Tutup</button>
                                                <button type="submit" name="status" value="Approve" class="btn btn-primary">Approve
                                                    Aduan</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                data-target="#TolakAduan{{ $AduanDetail->id }}">Tolak Aduan</button>

                                {{-- Modal Tolak --}}
                                <div class="modal fade bd-example-modal-xl" id="TolakAduan{{ $AduanDetail->id }}"
                                    tabindex="-1" aria-labelledby="TolakAduanLabel{{ $AduanDetail->id }}Label"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-xl">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title"
                                                    id="TolakAduanLabel{{ $AduanDetail->id }}Label">
                                                    Tolak Aduan</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="/Status/{{ $AduanDetail->id }}" method="POST"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="form-group">
                                                        <label for="judul">Judul Forum</label>
                                                        <input placeholder="Judul" id="judul" type="text"
                                                            class="form-control @error('judul') is-invalid @enderror"
                                                            name="judul" value="{{ $AduanDetail->Judul }}" required
                                                            autocomplete="judul" autofocus>

                                                        @error('judul')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Tutup</button>
                                                <button type="submit" name="status" value="Reject" class="btn btn-primary">Tolak
                                                    Aduan</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                            </form>
                        @endif



                </div>
                @endforeach

                {{-- <div class="card my-5">
                    <h5 class="card-header">Add Comment</h5>
                    <div class="card-body">
                        <form method="post"
                            action="{{ url('save-comment/' . Str::slug($AduanDetailorumDetail->Judul) . '/' . $AduanDetailorumDetail->id) }}">
                            @csrf
                            <textarea name="comment" class="form-control"></textarea>
                            <input type="submit" class="btn btn-dark mt-2" />
                    </div>

                </div> --}}

            </div>


        </div>
    </body>

    </html>
@endsection
