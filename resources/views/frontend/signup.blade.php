
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Dhaka Dreamin | Sign Up</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  @php
    $setting = DB::table('settings')->where('id',1)->first();
  @endphp
  <link rel="shortcut icon" href="{{URL::to($setting->site_logo)}}" type="image/x-icon">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('/')}}public/dashboard/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{asset('/')}}public/dashboard/icheck-bootstrap/icheck-bootstrap.min.css">

  <!--Fontawesome CDN-->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
  <!--Custom styles-->
  <link rel="stylesheet" href="{{asset('/')}}public/dashboard/css/login.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('/')}}public/dashboard/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  <style>
      .site-logo {
          max-width: 100px;
          width: 100%;
          text-align: center;
          margin: 0 auto;
      }
      
      .login-box {
          max-width: 400px;
          width: 100%;
          margin: 0 auto;
      }
      
      .card-body {
          padding-bottom: 0;
      }
  </style>

</head>
<body class="hold-transition login-page signup-page">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-header">
      <div class="login-logo">
        <a href="">
          @php
              $setting = DB::table('settings')->where('id',1)->first();
          @endphp
          <img style="max-width:100px;" src="{{URL::to($setting->dashboard_logo)}}" alt="">
        </a>
      </div>
      <h3 class="login-box-msg">Sign Up </h3>
       <!-- alert message -->
      <div class="d-flex justify-content-end social_icon">
        <a href="{{route('auth/facebook')}}"><span><i class="fab fa-facebook-square"></i></span></a>
        <a href="{{route('auth/google')}}"><span><i class="fab fa-google-plus-square"></i></span></a>
        <span><i class="fab fa-twitter-square"></i></span>
      </div>
      </div>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    <div class="card-body"> 
      <form action="{{route('save-user')}}" method="post" accept-charset="utf-8">
        @csrf
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Enter Name" name="name"  required="">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
            <input type="email" class="form-control" placeholder="Enter Email" name="email"  required="">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
        </div>
        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Enter Phone No" name="phone"  required="">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-phone"></span>
              </div>
            </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Enter Password"  name="password"  required="">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-6">
            <a href="{{route('home')}}" class="btn btn-success">Back</a>
          </div>
          <!-- /.col -->
          <div class="col-6">
            <button type="submit" class="btn btn-primary btn-block">Sign Up</button>
          </div>
          <!-- <p>already have account? please <a href="{{route('customer-login')}}">login</a></p> -->
          <!-- /.col -->
        </div>
      </form>
    </div>
    <div class="card-footer">
      <div class="d-flex justify-content-center links">
        Already have account ? please <a href="{{route('customer-login')}}">Login</a>
      </div>
      <!-- <p>already have account? please <a href="{{route('customer-login')}}">login</a></p> -->
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="{{asset('/')}}public/dashboard/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('/')}}public/dashboard/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="{{asset('/')}}public/dashboard/js/adminlte.min.js"></script>

</body>
</html>
