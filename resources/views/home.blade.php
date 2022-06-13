@extends('layouts.app')

@section('content')

<head>
    
</head>
<body>
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
</body>
@endsection

