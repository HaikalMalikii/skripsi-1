@extends('layouts.app')

@section('content')

<head>
<style>
    /* Set height of the grid so .sidenav can be 100% (adjust if needed) */
    .row.content {height: 1500px}
    
    /* Set gray background color and 100% height */
    .sidenav {
      background-color: #f1f1f1;
      height: 100%;
    }
    
    /* Set black background color, white text and some padding */
    footer {
      background-color: #555;
      color: white;
      padding: 15px;
    }
    
    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px;
      }
      .row.content {height: auto;} 
    }
  </style>
</head>
<body>

<div class="container-fluid">
  <div class="row content">
    <div class="col-sm-9"> 
      <h1 class="display-4">WELCOME TO LAPORIN</h1>
          <p class="lead my-3">menyediakan berbagai kemudahan bagi anda untuk berinetraksi dan menyampaikan keluhan</p>
          <button class="btn btn-primary btn-lg" type="button"><img src="css/foto/lapor.png" alt="lapor">Lapor</button>
          <button class="btn btn-primary btn-lg" type="button"><img src="css/foto/forum.png" alt="lapor">Forum</button>
          <button class="btn btn-primary btn-lg" type="button"><img src="css/foto/news.png" alt="lapor">Berita</button>
    </div>
    <div class="col-sm-3 sidenav">
      <div class="well">
        <h4 class="text-center">FORUM MASYARAKAT</h4>
      </div>
      <div class="card text-center" style="width: 100%;">
        <div class="card-body">
          <h5 class="card-title">Special title treatment</h5>
          <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
          <a href="#" class="btn btn-primary">Go somewhere</a>
        </div>
      </div>
      
      <div class="card text-center" style="width: 100%;">
        <div class="card-body">
          <h5 class="card-title">Special title treatment</h5>
          <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
          <a href="#" class="btn btn-primary">Go somewhere</a>
        </div>
      </div>
      <div class="card text-center" style="width: 100%;">
        <div class="card-body">
          <h5 class="card-title">Special title treatment</h5>
          <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
          <a href="#" class="btn btn-primary">Go somewhere</a>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="jumbotron text-center" style="margin-bottom:0">
  <h4 class="text-center mt-3">BERITA TERKINI</h4>
      <div class="d-flex justify-content-center">
          <div class="card" style="width: 20rem;">
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

