@extends('layouts.app')

@section('content');

<div class="container" style="padding-top: 7rem; min-height: 100vh">
    <h1>Berita</h1>
    @if ($errors->any())
    <div class="alert alert-danger">
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

    <div class="modal fade bd-example-modal-xl" id="addBerita" tabindex="-1" aria-labelledby="addBeritaLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addBeritaLabel">Tulis Berita</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/admin-add-berita" method="POST">
                        @csrf

                        <div class="form-group">
                            <label for="judul">Judul Berita</label>
                            <input placeholder="Judul" id="judul" type="text"
                                class="form-control @error('judul') is-invalid @enderror" name="judul" required
                                autocomplete="judul" autofocus>

                            <!-- @error('judul')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror -->
                        </div>


                        <div class="form-group">
                            <label for="description">Deskripsi Berita</label>
                            <textarea placeholder="Description"
                                class="form-control @error('description') is-invalid @enderror" name="description" id=""
                                cols="30" rows="5" required autocomplete="description" autofocus></textarea>

                            <!-- @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror -->
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
    @foreach ($berita as $b )
    <div class="card w-90">
  <div class="card-body">
   <a class="card-title" href="/Berita/{{$b->id}}">{{ $b->judul }}</a>
    <p class="card-text">{{ $b->description}}</p>
    <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editBerita-{{ $b->id }}">Edit</button>
    <button href="#" class="btn btn-warning btn-sm">Delete </button>
  </div>
</div>
@endforeach
</div>

@endsection
