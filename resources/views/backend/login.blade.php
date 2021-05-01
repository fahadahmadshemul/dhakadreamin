
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Dhaka Dreamin | Admin Login</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  @php
    $setting = DB::table('settings')->where('id',1)->first();
  @endphp
  <link rel="shortcut icon" href="{{URL::to($setting->dashboard_logo)}}" type="image/x-icon">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('/')}}public/dashboard/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{asset('/')}}public/dashboard/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('/')}}public/dashboard/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="">
      @php
          $setting = DB::table('settings')->where('id',1)->first();
      @endphp
      <img style="max-width:100px;" src="{{URL::to($setting->dashboard_logo)}}" alt="">
    </a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Admin Login</p>
       <!-- alert message -->
      
      
       
    <form action="{{route('save-admin-login')}}" method="post" accept-charset="utf-8">
      @php
          $admin_login_fail = Session::get('admin_login_fail');
      @endphp
      @if ($admin_login_fail)
          <p style="color:red;">{{$admin_login_fail}}</p>
      @endif
    @csrf
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="User Name" name="username"  required="">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          
          <input type="password" class="form-control" placeholder="Password"  name="password"  required="">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>

          </div>
          <!-- /.col -->
        </div>
       </form>

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
