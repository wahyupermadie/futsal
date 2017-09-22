<!DOCTYPE html>
<html lang="en">

  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="msapplication-tap-highlight" content="no">
    <meta name="description" content="Futnet adalah sebuah marketplace untuk penyewaan lapangan futsal secara online">
    <meta name="keywords" content="Futsal, Futnet, Futsal Bali, Futsal Denpasar">
    <title>Login Page | Futnet - Futsal Network</title>

    <!-- Favicons-->
    <link rel="icon" href="images/favicon/favicon-32x32.png" sizes="32x32">
    <!-- Favicons-->
    <link rel="apple-touch-icon-precomposed" href="{{ asset('style/login/images/favicon/apple-touch-icon-152x152.png')}}">
    <!-- For iPhone -->
    <meta name="msapplication-TileColor" content="#00bcd4">
    <meta name="msapplication-TileImage" content="{{ asset('style/login/images/favicon/mstile-144x144.pn')}}'">
    <!-- For Windows Phone -->


    <!-- CORE CSS-->
    <link href="{{ asset('style/login/css/materialize.min.css') }}" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="{{ asset('style/login/css/style.min.css') }}" type="text/css" rel="stylesheet" media="screen,projection">
    <!-- Custome CSS-->    
    <link href="{{ asset('style/login/css/custom/custom.min.css')}}" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="{{ asset('style/login/css/layouts/page-center.css')}}" type="text/css" rel="stylesheet" media="screen,projection">
    <!-- INCLUDED PLUGIN CSS ON THIS PAGE -->
    <link href="{{ asset('style/login/js/plugins/prism/prism.css')}}" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="{{ asset('style/login/js/plugins/perfect-scrollbar/perfect-scrollbar.css') }}" type="text/css" rel="stylesheet" media="screen,projection">

  </head>

  <body class>
    <!-- Start Page Loading -->
    <div id="loader-wrapper">
      <div id="loader"></div>        
      <div class="loader-section section-left"></div>
      <div class="loader-section section-right"></div>
    </div>
    <!-- End Page Loading -->

    <div id="login-page" class="row">
      <div class="col s12 z-depth-4 card-panel">
        <form method="POST" action="{{ route('login.customer') }}" class="login-form">
          {{ csrf_field() }}
          <div class="row">
            <div class="input-field col s12 center">
              <img src="{{ asset('style/login/images/logo.jpg')}}" alt="" class="circle responsive-img valign profile-image-login">
              <p class="center login-form-text">FutNet Customer Login</p>
            </div>
          </div>
          <div class="row margin">
            @if ($errors->has('username'))
            <span style="color:red;">
               {{ $errors->first('username') }}
            </span>
            @endif
            <div class="input-field col s12{{ $errors->has('usernmae') ? ' has-error' : '' }}">
              <i class="mdi-social-person-outline prefix"></i>
              <input value="{{ old('username') }}"type="text" class="form-input" name="username" placeholder="username" required autofocus>
              <label for="username" class="center-align">Username</label>
            </div>
          </div>
          <div class="row margin">
            @if ($errors->has('password'))
            <span style="color:red;">
              {{ $errors->first('password') }}
            </span>
            @endif
            <div class="input-field col s12{{ $errors->has('password') ? ' has-error' : '' }}">
              <i class="mdi-action-lock-outline prefix"></i>
              <input type="password" name="password" class="form-input" placeholder="password" required="required">
              <label for="password">Password</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s12">
              <button type="submit" class="btn waves-effect waves-light col s12">Sign in</button>
              <!-- <a href="index.html" class="btn waves-effect waves-light col s12">Login</a> -->
            </div>
          </div>
          <div class="row">
            <div class="input-field col s6 m6 l6">
              <p class="margin medium-small"><a href="{{route('customer.registerForm')}}">Register Now!</a></p>
            </div>
            <div class="input-field col s6 m6 l6">
              <p class="margin right-align medium-small"><a href="page-forgot-password.html">Forgot password ?</a></p>
            </div>          
          </div>
        </form>
      </div>
    </div>



  <!-- ================================================
    Scripts
    ================================================ -->

    <!-- jQuery Library -->
    <script type="text/javascript" src="{{ asset('style/login/js/plugins/jquery-1.11.2.min.js')}}"></script>
    <!--materialize js-->
    <script type="text/javascript" src="{{ asset('style/login/js/materialize.min.js')}}"></script>
    <!--prism-->
    <script type="text/javascript" src="{{ asset('style/login/js/plugins/prism/prism.js')}}"></script>
    <!--scrollbar-->
    <script type="text/javascript" src="{{ asset('style/login/js/plugins/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>

    <!--plugins.js - Some Specific JS codes for Plugin Settings-->
    <script type="text/javascript" src="{{ asset('style/login/js/plugins.min.js')}}"></script>
    <!--custom-script.js - Add your own theme custom JS-->
    <script type="text/javascript" src="{{ asset('style/login/js/custom-script.js')}}"></script>

  </body>

  </html>