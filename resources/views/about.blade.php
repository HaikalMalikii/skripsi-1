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

            .container {
                margin-top: 50px;
                margin-left: 20px;

            }

            h1 {
                font-size: 4vw;
            }

            h2 {
                margin: 20px;
            }
            p{
                font-size: 2vw;
            }
        </style>
    </head>
    <body>
        <a href="/">Kembali</a>
            <div class="container">
                <h1>LAPOR-in</h1>
                <p>Laporin merupakan aplikasi yang dirancang pada tahun 2022.
                    Sebagai bagian dari masyarakat, aplikasi ini dapat dijadikan wadah oleh seluruh masyarakat
                    untuk menyampaikan asprasi dan keresahan mereka mengenai lingkungan sekitar.<br>
                    LAPOR-in memiliki fitur utama yaitu menyampaikan aduan yang akan terhubung langsung ke instansi terkait dan kelurahan
                </p>
            </div>
    </body>
@endsection