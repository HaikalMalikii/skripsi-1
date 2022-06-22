@extends('layouts.app')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detail Berita</title>
</head>

<body>
    @section('content')

        <body>
            <div class="container" style="margin-top:40px">
                <div class="row">
                    <div class="col-md-9">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="post-detail">
                                    
                                    {{-- @php
                                        dd('$b');
                                    @endphp --}}
                                        <h3>{{ $berita->judul }}</h3>

                                        <div class="info-meta">
                                            <ul class="list-inline">
                                                <li><i class="fa fa-clock-o"></i> {{ $berita->created_at }}</li>
                                                {{-- <li><i class="fa fa-eye"></i>21k</li>
                                                <li><i class="fa fa-heart-o"></i>372</li> --}}
                                                <li><i class="fa fa-user"></i> Diposting oleh Kelurahan Rempoa</li>
                                                {{-- <li class="pull-right">Category : Education</li> --}}
                                            </ul>
                                            <hr>
                                            <p>
                                                {{ $berita->description }}
                                            </p>
                                        </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </body>
    @endsection
</body>

</html>
