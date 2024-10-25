<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'iDin!') }}</title>

    {{-- Estilos do MAZER --}}
    <link rel="stylesheet" crossorigin href="{{ url('/') }}/assets/compiled/css/app.css">
    <link rel="stylesheet" crossorigin href="{{ url('/') }}/assets/compiled/css/app-dark.css">
    <link rel="stylesheet" crossorigin href="{{ url('/') }}/assets/compiled/css/iconly.css">
    <link rel="shortcut icon" href="{{ url('/') }}/assets/static/images/logo/favicon.svg" type="image/x-icon">
    <link rel="shortcut icon" href="{{ url('/') }}/assets/static/images/logo/favicon.png" type="image/png">
    {{-- FIM --}}

    <!-- Scripts -->
    <script src="{{ url('/') }}/js/app.js"></script>

    <!-- JQuery Mask -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Ubuntu+Mono&display=swap" rel="stylesheet">

    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.js"></script>

<style>

.form-box{
    position: relative;
    width: 380px;
    height: 550px;
    background: rgba(255, 255, 255, 0.123);
    border: none;
    /* border: 2px solid rgba(255,255,255,0.5); */
    border-radius: 20px;
    backdrop-filter: blur(9px);
    display: flex;
    justify-content: center;
    align-items: center;

}
@media only screen and (max-width: 600px) {
    .form-box{
        position: relative;
    width: 380px;
    height: 550px;
    background: rgba(255, 255, 255, 0.123);
    border: none;
    border-radius: 20px;
    backdrop-filter: blur(9px);
    display: flex;
    justify-content: center;
    align-items: center;
    margin: 15px;
    margin-top: -85px;
  }
}
    section{
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        width: 100%;

        background: url('images/fundo.png')no-repeat;
        background-position: center;
        background-size: cover;
    }
    .img{

    width: 150px;

}
</style>
</head>
<section>
<script src="{{ url('/') }}/assets/static/js/initTheme.js"></script>
<div class="container">
    <div class="row justify-content-center m-3">
        <div class="col-md-4">
            <div  class="card p-4">
                <center>  <img class="img m-2" src="assets/static/images/logo/logo.png"></center>
                <div class="card-header text-center">{{ __('login.Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-3 col-form-label text-md-right">{{ __('login.E-Mail Address') }}</label>

                            <div class="col-md-9">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-3 col-form-label text-md-right">{{ __('login.Password') }}</label>

                            <div class="col-md-9">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-7 ">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('login.Remember Me') }}
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-5 ">
                                <a style="color: rgb(144, 229, 255)"  class="nav-link" href="{{ route('register') }}">{{ __('app.Register') }}</a>

                            </div>
                        </div>
                    </br>


                        <div class="form-group row mb-0">
                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('login.Login Btn') }}
                                </button>
                            </br>

                            </div>
                        </br>
                            <div class="col-md-12 text-center">
                            </br>
                                @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('login.Forgot Your Password?') }}
                                </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
