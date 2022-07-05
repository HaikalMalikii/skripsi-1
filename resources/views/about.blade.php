@extends('layouts.app')

@section('content')

    <head>
        <style>
            /* Set height of the grid so .sidenav can be 100% (adjust if needed) */
            .row.content {
                height: 1500px
            }

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

                .row.content {
                    height: auto;
                }
            }

            .container-xl {
                margin-top: 50px;

            }
/* body{
    background-image: url("css/foto/laporinrempoa.png");
    background-size: 70%;
    background-repeat: no-repeat;
    background-position: 50%;
    background-attachment: fixed;
} */

            h1 {
                font-size: 4vw;
            }

            h2 {
                margin: 20px;
            }

            p {
                font-size: 2vw;
            }
            .img-fluid{
                width: fit-content;
                height: fit-content;
            }

        </style>
    </head>

    <body>
    <div class="row align-items-start">
            <a href="/AduanViewUser" class="float-left">
                <img src="{{ asset("css/foto/KEMBALI.png") }}" style="width: 15%;height:15%;">
            </a>
        </div>
        <div class="container-xl">
            <div class="row">

                <div class="col-md-8">
                    <h1>LAPOR-in</h1>
                    <p>Laporin merupakan aplikasi yang dirancang pada tahun 2022 bekerjasama dengan kelurahan rempoa.<br>
                        Sebagai bagian dari masyarakat, aplikasi ini dapat dijadikan wadah oleh seluruh masyarakat di kelurahan rempoa
                        untuk menyampaikan asprasi dan keresahan mereka mengenai lingkungan sekitar.<br>
                        LAPOR-in memiliki fitur utama yaitu menyampaikan aduan yang akan terhubung langsung ke instansi terkait dan
                        kelurahan.
                    </p>
                </div>
                <div class="col-md-4">
                    <img src="css/foto/laporinrempoa.png" alt="Image" class="img-fluid">
                </div>

            </div>
        </div>
    </body>
@endsection
