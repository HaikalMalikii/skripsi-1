@extends('layout.layout')

@section('content')
<head>
  <style>
    .img-fluid{
      width: fit-content;
      height: fit-content;
    }
    .content{
      margin-top: 30px;
      border:black;
      border-radius: 10px;
    }
  .logo{
    background-color: lightblue;
    text-align: center;
  }
  .img-fluid{
    margin-top: 75px;
  }
  .border{
    padding: 20px;
  }

  </style>
<link rel="stylesheet" href="{{ asset('css/style.css') }}">

</head>

<body>
  

  
  <div class="content">
    <div class="container">
      <div class="row">
        <div class="logo col-md-6 border">
          <img src="css/foto/2.png" alt="Image" class="img-fluid">
        </div>
        <div class="col-md-6 contents border">
          <div class="row justify-content-center">
            <div class="col-md-8">
              <div class="mb-4">
              <h3 class="card-title">Selamat Datang di LAPOR-in</h3>
              <p class="mb-4">Silahkan Masuk menggunakan Akun anda</p>
            </div>
            <form method="POST" action="{{ route('login') }}">
            @csrf
              <div class="form-group first">
                <label for="email">{{ __('Alamat Email') }}</label>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                
              </div>
              <div class="form-group last mb-4">
                <label for="password">{{ __('Password') }}</label>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              
              <div class="d-flex mb-5 align-items-center">
                <!-- {{-- <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                      <label class="form-check-label" for="remember">{{ __('Remember Me') }}</label>
                </div> --}} -->
                <a href="/register" class="forgot-pass">Belum Punya Akun?</a>

                @if (Route::has('password.request'))
                <span class="ml-auto"><a href="{{ route('password.request') }}" class="forgot-pass">Lupa Kata Sandi</a></span> 
                @endif
              </div>

              
              <button type="submit" class="btn btn-block btn-primary">
                                    {{ __('Log In') }}
                                </button>

              <span class="d-block text-center my-4 text-muted">&mdash; atau login dengan &mdash;</span>
              
              <div class="text-center">
                <a href="{{ '/auth/redirect'}}" class="">
                  <img src="css\foto\google.png">  
                </a>
              </div>
            </form>
            </div>
          </div>
          
        </div>
        
      </div>
    </div>
  </div>

  </body>
</html>

@endsection
