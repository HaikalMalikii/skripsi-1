@extends('layouts.app')

@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>ForumDetail</title>
        <style>

        </style>
    </head>

    <body>
        <div class="container">
            <div class="col-md-1">
                @if (Session::has('sukes'))
                    <p class="text-success">{{ session('sukes') }}</p>
                @endif
            </div>
            <div class="card w-90">
                <div class="card-body">
                    @foreach ($AduanDetail as $AduanDetail)
                        <h4 class="card-reader">Oleh : {{ $AduanDetail->name }} </h4>
                        <img src="{{ asset("css/foto/$AduanDetail->Gambar") }}" alt="" srcset="">
                        <h4 class="card-reader"> {{ $AduanDetail->Judul }} </h4>
                        <h3 class="card-reader"> {{ $AduanDetail->Deskripsi }} </h3>

                        
                </div>
                @endforeach

                {{-- <div class="card my-5">
                    <h5 class="card-header">Add Comment</h5>
                    <div class="card-body">
                        <form method="post"
                            action="{{ url('save-comment/' . Str::slug($ForumDetail->Judul) . '/' . $ForumDetail->id) }}">
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
