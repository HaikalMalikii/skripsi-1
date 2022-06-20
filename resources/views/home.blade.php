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
    .container{
      margin-top:50px;
      margin-left: 20px;
    }
    h1{
      font-size:4vw;
    }
    h2{
      margin: 20px;
    }

  </style>
</head>
<body>

<div class="container-fluid">
  <div class="row content">
    <div class="container">
      <div class="col-xs-14 col-sm-13 col-lg-15"> 
        <h1 class="">WELCOME TO LAPORIN</h1>
            <p class="lead my-3" style="font-size:1.5vw;">menyediakan berbagai kemudahan bagi anda untuk berinteraksi dan menyampaikan keluhan</p>
            <a class="btn btn-primary btn-lg" type="button" href="/AddAduan" ><img src="css/foto/lapor.png" alt="lapor">Lapor</a>
            <a class="btn btn-primary btn-lg" type="button" href="/forum"><img src="css/foto/forum.png" alt="lapor">Forum</a>
            <a class="btn btn-primary btn-lg" type="button" href="/berita"><img src="css/foto/news.png" alt="lapor">Berita</a>
      </div>
    </div>

    <div class="col-sm-2 sidebar-right">
        <h2>FORUM MASYARAKAT</h2>
      <div class="card text-center w-75" style="width: 100%;">
        <div class="card-body">
          <h5 class="card-title">Special title treatment</h5>
          <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
          <a href="#" class="btn btn-primary">Go somewhere</a>
        </div>
      </div>
      
      <!-- <div class="card text-center" style="width: 100%;">
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
          <a href="#" class="btn btn-primary">Go somewhere</a> -->
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

