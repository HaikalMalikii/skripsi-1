@extends('layouts.app')

@section('content')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Roboto+Condensed&display=swap');
    @import url('https://fonts.googleapis.com/css2?family=Roboto+Condensed&family=Roboto+Mono:ital,wght@0,400;1,500&display=swap');    
    @import url('https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Roboto+Condensed&family=Roboto+Mono:ital,wght@0,400;1,500&display=swap');
    .card{
        background-color: #9BA3EB;
        margin: 5px;
        color: white;
    }
    .btn{
        background-color: #FFE3A9;
        color: black;
        border-color: blue;
        border-width: 2px;
        font-family: 'Roboto Mono', monospace;
    }
    h5, p{
        font-family: 'Roboto Condensed', sans-serif;
    }
    h4 {
        font-family: 'Bebas Neue', cursive;
    }
</style>
<div class=" body d-flex flex-column">
    <div class="d-flex justify-content-md-between">
        <div class="col-sm-6">
            <div class="row">
                <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                    <h5 class="card-title">Aspirasi Rakyat</h5>
                    <p class="card-text">Mayarakat dapat menuliskan keluhan nya di sini.</p>
                    <a href="{{ url('AddAduan') }}" class="btn btn-primary">click here</a>
                    </div>
                </div>
                </div>
                <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                    <h5 class="card-title">Forum Rakyat</h5>
                    <p class="card-text">Masyarakat dapat melihat forum keluhan nya disini.</p>
                    <a href="#" class="btn btn-primary">click here</a>
                    </div>
                </div>
                </div>
            </div>
        </div>
        <div class="mr-3">
            <h4 class="text-center">FORUM MASYARAKAT</h4>
            <div class="card text-center" style="width: 18rem;">
                <div class="card-body">
                <h5 class="card-title">Special title treatment</h5>
                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
            <div class="card text-center" style="width: 18rem;">
                <div class="card-body">
                <h5 class="card-title">Special title treatment</h5>
                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
            <div class="card text-center" style="width: 18rem;">
                <div class="card-body">
                <h5 class="card-title">Special title treatment</h5>
                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
            <div class="card text-center" style="width: 18rem;">
                <div class="card-body">
                <h5 class="card-title">Special title treatment</h5>
                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
            <div class="card text-center" style="width: 18rem;">
                <div class="card-body">
                <h5 class="card-title">Special title treatment</h5>
                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
    </div>

    <h4 class="text-center mt-3">BERITA TERKINI</h4>
    <div class="d-flex justify-content-center">
        <div class="card" style="width: 18rem;">
            <div class="card-body">
              <h5 class="card-title">Special title treatment</h5>
              <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
              <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
          </div>
          <div class="card" style="width: 18rem;">
            <div class="card-body">
              <h5 class="card-title">Special title treatment</h5>
              <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
              <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
          </div>
          <div class="card" style="width: 18rem;">
            <div class="card-body">
              <h5 class="card-title">Special title treatment</h5>
              <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
              <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
          </div>
    </div>
</div>
@endsection
