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
<link rel="stylesheet" type="text/css" href="{{url('https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css')}}">
<script src="{{url('https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js')}}"></script>
</head>

<body class="cyan">
<!-- Start Page Loading -->
<div id="loader-wrapper">
  <div id="loader"></div>        
  <div class="loader-section section-left"></div>
  <div class="loader-section section-right"></div>
</div>
<!-- End Page Loading -->

<div class="row">
<div class="col s8 m12 l12">
  <div class="card-panel">
    <div class="row">
          <!--Form Advance-->          
          <div class="row">
            <div class="col s12 m12 l12">
              <div class="card-panel">
              <div class="input-field col s12 center">
                <img src="{{ asset('style/login/images/logo.jpg')}}" alt="" class="circle responsive-img valign profile-image-login">
                      <p class="center login-form-text">FutNet Customer Login</p>
                </div>
                <div class="row">
                  <form method="POST" enctype="multipart/form-data" action="{{route('customer.register')}}" class="col s12">
                    {{ csrf_field() }}
                    <div class="row">
                      <div class="input-field col s6">
                        <input name="full_name" id="full_name" type="text" required="required">
                        <label for="full_name">Nama Pemilik Futsal</label>
                      </div>
                      <div class="input-field col s6">
                        <input name="futsal_name" id="futsal_name" type="text" required="required">
                        <label for="futsal_name">Nama Futsal</label>
                      </div>
                    </div>
                    <div class="row">
                      <div class="input-field col s6">
                        <input name="username" id="username" type="text" required="required">
                        <label for="email">Username</label>
                      </div>
                      <div class="input-field col s6">
                        <input name="phone" id="phone" type="number" required="required">
                        <label for="phone">No Telepon</label>
                      </div>
                    </div>
                    <div class="row">
                      <div class="input-field col s6">
                        <input name="password" id="password" type="password" required="required">
                        <label for="password">Password</label>
                      </div>
                      <div class="input-field col s6">
                        <input name="confirmpassword" id="confirmpassword" type="password" required="required">
                        <label for="password">Password Konfrimasi</label>
                      </div>
                    </div> 
                    <div class="row">
                      <div class="file-field input-field col s6">
                        <input class="file-path validate" type="text"/>
                        <label for="futsalpicture">Gambar Futsal</label>
                        <div class="btn green waves-effect waves-light">
                          <span>Browse</span>
                          <input name="futsalpicture" type="file" required="required" />
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="input-field col s12">
                        <textarea name="address" id="address" class="materialize-textarea" length="120" required="required"></textarea>
                        <label for="message">Alamat</label>
                      </div>
                      <div class="row">
                        <div class="input-field col s6 m6 l6">
                            <p class="margin medium-small">Sudah Punya Akun ? <a href="{{route('customer.loginForm')}}">Login Now!</a></p>
                        </div>
                        <div class="input-field col s12">
                          <button class="btn cyan waves-effect waves-light right" type="submit">Submit
                            <i class="mdi-content-send right"></i>
                          </button>
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
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