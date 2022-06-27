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
</head>

@section('content')

<body>

  <div class="content">
    <div class="container">
      <div class="row">

        <div class="col-md-6 contents border">
          <div class="row justify-content-center">
            <div class="col-md-8">
              <div class="mb-4">
              <h3>Welcome to LAPOR-in</h3>
              <p class="mb-4">Silahkan melakukan Registrasi</p>
            </div>
            <form method="POST" action="{{ route('register') }}">
            @csrf
                <div class="form-group first">
                    <label for="name">{{ __('Name') }}</label>

                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>
              <div class="form-group first">
                <label for="email">{{ __('E-Mail Address') }}</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

              </div>
              <div class="form-group first">
                <label for="number">{{ __('No Handphone') }}</label>
                        <input id="nohp" type="nohp" class="form-control @error('nohp') is-invalid @enderror" name="nohp" value="{{ old('nohp') }}" required autocomplete="nohp">

                        @error('nohp')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

              </div>
              <div class="form-group last mb-4">
              <label for="password">{{ __('Password') }}</label>

                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              <div class="form-group last mb-4">
              <label for="password-confirm">{{ __('Confirm Password') }}</label>
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
              </div>
              <br>
              <button type="submit" class="btn btn-block btn-primary">{{ __('Register') }} </button>
              </div>
            </form>
            </div>
          </div>
          <div class="logo col-md-6 border">
          <img src="css/foto/2.png" alt="Image" class="img-fluid">
        </div>
        </div>  
      </div>
    </div>
  </div>
  </body>
</html>
@endsection
