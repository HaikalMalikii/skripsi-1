@extends('layouts.app')

@section('content')

<div class="main">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">Posts</h3>
                        <div class="right">
                            <a href="{{ url('/addforum') }}" class="btn btn-sm btn-primary">Add new Posts </a>
                        </div>
                    </div>

                    <div class="panel-body">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Tanggal</th>
                                    <th>Title</th>
                                    <th>Aspirasi</th>
                                    <th>Photo</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($forum as $frm )
                                
                                    <td>{{ $frm->id }}</td>
                                    
    
                                    <td>
                                        <a href="/ForumDetail/{{$frm->id}}">
                                            {{ $frm->Title }}
                                        </a>
                                    </td>
                                    <td>{{ $frm->Aspirasi }}</td>
                                    <td>{{ $frm->total }}</td>
                                    {{-- <td>{{ $frm->use }}</td> --}}
                                    <td>                                  
                                        <a target="_blank" class="btn btn-warning btn-sm">Comment</a>
                                        <a href="#" class="btn btn-warning btn-sm">View </a>                            
                                        <a href="#" class="btn btn-danger btn-sm delete">Dislike </a>                        
                                    </td>
                                


                                

                                    
                                @endforeach


@endsection

