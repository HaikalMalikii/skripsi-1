@extends('layouts.app')

@section('content');

<div class="container" style="padding-top: 7rem; min-height: 100vh">
    <h1>Berita</h1>

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
                                class="form-control @error('judul') is-invalid @enderror" judul="judul" required
                                autocomplete="judul" autofocus>

                            @error('judul')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="description">Deskripsi Berita</label>
                            <textarea placeholder="Description"
                                class="form-control @error('description') is-invalid @enderror" name="description" id=""
                                cols="30" rows="5" required autocomplete="description" autofocus></textarea>

                            @error('description')
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
    <table class="table table-striped my-3">
        <thead class="thead-dark">
            <tr>
                <th style="width: 10%" scope="col">No</th>
                <th style="width: 30%" scope="col">Judul</th>
                <th style="width: 60%" scope="col">Description</th>
            </tr>
        </thead>


    </table>

</div>

@endsection
