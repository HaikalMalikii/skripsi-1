@extends('layouts.layoutsKelurahan')



@section('content');

    <head>
        <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
    </head>

    <body>
        <!-- <div style="">
            <div class="bg-light clearfix">
                <a href="/Admin.dashboardAdminKelurahan" type="button" class="btn float-right">Kembali</a>
            </div>
        </div> -->
        <div class="">
            <a href="/" class="previous">
                <button class="btn btn-sm btn-secondary">Kembali</button>
            </a>
        </div>

        <div class="container" style="min-height: 100vh">

            <h1>Berita</h1>
            @if ($errors->any())
                <div id="" style="display: none;" class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addBerita">
                Tulis Berita
            </button>

            <div class="modal fade bd-example-modal-xl" id="addBerita" tabindex="-1" aria-labelledby="addBeritaLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="addBeritaLabel">Tulis Berita</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="/admin-add-berita" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="form-group">
                                    <label for="judul">Judul Berita</label>
                                    <input placeholder="Judul" id="judul" type="text"
                                        class="form-control @error('judul') is-invalid @enderror" name="judul" required
                                        autocomplete="judul" autofocus>

                                    @error('judul')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>


                                <div class="form-group">
                                    <label for="description">Deskripsi Berita</label>
                                    <textarea placeholder="Description" class="form-control @error('description') is-invalid @enderror" name="description"
                                        id="" cols="30" rows="5" required autocomplete="description" autofocus></textarea>

                                    @error('description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="image">Image</label>
                                    <input placeholder="Image" id="image" type="file"
                                        class="form-control-file @error('image') is-invalid @enderror" name="image"
                                        required autocomplete="image" autofocus>

                                    @error('image')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Tulis Berita</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            @foreach ($berita as $b)
                <div class="card w-90">
                    <div class="card-body">
                        <p class="card-text">
                            {{ isset(Auth::user()->created_at) ? Auth::user()->created_at->format('d/M/Y') : Auth::user()->name }}
                        </p>
                        <td>
                            <img class="img-fluid" src="{{ asset("css/foto/$b->image") }}" alt="">
                        </td>

                        <h3 class="card-title" href="/Berita/{{ $b->id }}">{{ $b->judul }}</h3>
                        <p class="card-text">
                            {{ Illuminate\Support\Str::limit($b->description, 200) }}</p>
                        <td>
                            <div class="float-right">
                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target="#updateBerita{{ $b->id }}">
                                    Edit Berita
                                </button>

                                <!-- Modal -->
                                <div class="modal fade bd-example-modal-xl" id="updateBerita{{ $b->id }}"
                                    tabindex="-1" aria-labelledby="updateBeritaLabel{{ $b->id }}Label"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-xl">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="updateBeritaLabel{{ $b->id }}Label">
                                                    Edit Berita</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="/admin-edit-berita/{{ $b->id }}" method="POST"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="form-group">
                                                        <label for="judul">Judul Berita</label>
                                                        <input placeholder="Judul" id="judul" type="text"
                                                            class="form-control @error('judul') is-invalid @enderror"
                                                            name="judul" value="{{ $b->judul }}" required
                                                            autocomplete="judul" autofocus>

                                                        @error('judul')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="description">Deskripsi Berita</label>
                                                        <textarea placeholder="Description" class="form-control @error('description') is-invalid @enderror"
                                                            name="description" id="" cols="30" rows="5" required autocomplete="description" autofocus>{{ $b->description }}</textarea>

                                                        @error('description')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="image">Image</label>
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
                                                <button type="submit" class="btn btn-primary">Update Berita</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <button type="button" class="btn btn-danger" data-toggle="modal"
                                    data-target="#deleteBerita{{ $b->id }}">
                                    Hapus Berita
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="deleteBerita{{ $b->id }}" tabindex="-1"
                                    aria-labelledby="deleteBeritaLabel{{ $b->id }}Label" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="deleteBeritaLabel{{ $b->id }}Label">
                                                    Hapus Berita</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <h3 class="text-danger">Apakah anda yakin ingin menghapus berita ini "
                                                    {{ $b->judul }}"?</h3>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Close</button>
                                                <a href="/admin-delete-berita/{{ $b->id }}"
                                                    class="btn btn-danger">Hapus
                                                    Berita</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </td>

                    </div>
                </div>
            @endforeach
        </div>
        @include('sweetalert::alert')

    @endsection
</body>
