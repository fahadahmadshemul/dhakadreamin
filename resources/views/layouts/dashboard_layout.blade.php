
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <title>Dhaka Dreamin | Admin Panel</title>
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
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="{{asset('/')}}public/dashboard/tempudsominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">

  <link rel="stylesheet" href="{{asset('/')}}public/dashboard/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="{{asset('/')}}public/dashboard/datatables-responsive/css/responsive.bootstrap4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{asset('/')}}public/dashboard/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{asset('/')}}public/dashboard/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('/')}}public/dashboard/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{asset('/')}}public/dashboard/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{asset('/')}}public/dashboard/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="{{asset('/')}}public/dashboard/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link rel="stylesheet" href="{{asset('/')}}public/dashboard/select2/css/select2.min.css">
  <link rel="stylesheet" href="{{asset('/')}}public/dashboard/css/style.css">
  <link rel="stylesheet" href="{{asset('/')}}public/dashboard/css/bootstrap-tagsinput.css">
  <!-- jQuery -->
<script src="{{asset('/')}}public/dashboard/jquery/jquery.min.js"></script>

<style>
  .box-shadow{
    margin-bottom:20px;
    box-shadow:0 6px 15px 0 rgba(207, 211, 218, 0.35);
}
.error{
  color:red;
  font-style:italic;
  font-size:14px;
}
.sub_menu{
  font-size:14px;
}
</style>
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">

  <!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="javascript:void(0)" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
         <i class="fas fa-cog"></i>
        </a>
        <ul class="dropdown-menu  dropdown-menu-right">
            <li class="dropdown-item"><a href="{{route('setting')}}"> <i class="fas fa-cog"></i>  Setting</a></li>
            <li class="dropdown-item"><a href="{{route('change-password')}}"> <i class="fas fa-cog"></i>  Change Password</a></li>
            <li class="dropdown-item"><a href="{{route('admin-logout')}}"> <i class="fas fa-sign-out-alt mr-2"></i>  Logout</a></li>
            
        </ul>
      </li>
     
    </ul>
  </nav>
  <!-- /.navbar -->

  
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-info elevation-4">
    <!-- Brand Logo -->
        <a href="{{route('dashboard')}}" class="brand-link">
          @php
              $setting = DB::table('settings')->where('id', 1)->first();
          @endphp
            <img src="{{URL::to($setting->dashboard_logo)}}" alt="AdminLTE Logo" class="brand-image " >
           <span class="brand-text font-weight-light">&nbsp;</span>
    </a>


 <!-- sidebar -->

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
                    </div>
        <div class="info">
          <a href="{{route('dashboard')}}" class="d-block">admin</a>
           <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
       <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('dashboard')}}" class="nav-link">
                  <i class="fas fa-home nav-icon"></i>
                  <p>Dashboard</p>
                </a>
              </li>
            </ul>
          </li>         
        
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tree"></i>
              <p>
                Home Content
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('add-service-center')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p class="sub_menu">Add Sevice Center</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('service-center-list')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p class="sub_menu">Service Center List</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('menu')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p class="sub_menu">Menu</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('add-how-it-work')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p class="sub_menu">Add How Does It Work</p>
                </a>
              </li><li class="nav-item">
                <a href="{{route('how-it-work-list')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p class="sub_menu">How Does It Work List</p>
                </a>
              </li>
            </ul>
          </li>
          
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tree"></i>
              <p>
                Room 
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('add-room')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p class="sub_menu">Add Room</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('room-list')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p class="sub_menu">Room List</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('room-content')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p class="sub_menu">Reservation Room Content</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tree"></i>
              <p>
                About Us 
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('about')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p class="sub_menu">About Us</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tree"></i>
              <p>
                Contact Us 
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('b-contact')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p class="sub_menu">Contact Us</p>
                </a>
              </li>
            </ul>
          </li>
          
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tree"></i>
              <p>
                Concierge Service 
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('add-concierge-service')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p class="sub_menu">Add Concierge Service</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('all-concierge-service')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p class="sub_menu">Concierge Service List</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tree"></i>
              <p>
                Housekepping & Room  
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('add-house-room-service')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p class="sub_menu">Add Housekepping & Room</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('all-house-room-service')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p class="sub_menu">Housekepping & Room List</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tree"></i>
              <p>
                Food & Beverage Service 
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('add-food-beverage-service')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p class="sub_menu">Add Food & Beverage</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('all-food-beverage-service')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p class="sub_menu">Food & Beverage List</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tree"></i>
              <p>
                Event Service 
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('add-event-service')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p class="sub_menu">Add Event Service</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('all-event-service')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p class="sub_menu">Event Service List</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tree"></i>
              <p>
                Business Center Service 
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('add-busines-center-service')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p class="sub_menu">Add Business Center Service</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('all-busines-center-service')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p class="sub_menu">Business Center Service List</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tree"></i>
              <p>
                Eexternal Service 
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('add-external-service')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p class="sub_menu">Add External Service</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('all-external-service')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p class="sub_menu">External Service List</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tree"></i>
              <p>
                Laundry
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('add-laundry-service')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p class="sub_menu">Add Laundry Service</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('all-laundry-service')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p class="sub_menu">Laundry Service List</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tree"></i>
              <p>
                Dry Cleaning Service
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('add-dry-cleaning-service')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p class="sub_menu">Add Dry Cleaning Service</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('all-dry-cleaning-service')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p class="sub_menu">Dry Cleaning Service List</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tree"></i>
              <p>
                Pressing Service
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('add-pressing-service')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p class="sub_menu">Add Pressing Service</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('all-pressing-service')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p class="sub_menu">Pressing Service List</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tree"></i>
              <p>
                Owner Special
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('add-owner-special')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p class="sub_menu">Add Owner Special</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('all-owner-special')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p class="sub_menu">Owner Special List</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tree"></i>
              <p>
                FAQs
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('add-faq')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p class="sub_menu">Add FAQs</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('all-faq')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p class="sub_menu">FAQs List</p>
                </a>
              </li>
            </ul>
          </li>
          
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tree"></i>
              <p>
                Transport Services
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('airport-content')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p class="sub_menu">Airport Pick Up/Drop Offs</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('car-rental-content')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p class="sub_menu">Full Day Car Rental</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('car-by-cycle-content')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p class="sub_menu">Bicycle Rental</p>
                </a>
              </li>
            </ul>
          </li>
          
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tree"></i>
              <p>
                Footer Section
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('footer-about-content')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p class="sub_menu">Add Footer About Content</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('footer-about-content-list')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p class="sub_menu">Footer About Content List</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('footer-community-content')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p class="sub_menu">Add Footer Community Content</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('footer-community-content-list')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p class="sub_menu">Footer Community Content List</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('footer-support-content')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p class="sub_menu">Add Footer Support Content</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('footer-support-content-list')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p class="sub_menu">Footer Support Content List</p>
                </a>
              </li>
            </ul>
          </li>
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  @yield('content')


  <script>
  $(function ($) {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
  });




</script>      
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
   <footer class="main-footer">
      <!--   <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.0.5
    </div> -->
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>

<!-- ./wrapper -->
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('/')}}public/dashboard/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 4 -->
<script src="{{asset('/')}}public/dashboard/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Sparkline -->
// <!-- <script src="http://localhost/selflearning/frontend/assets/plugins/sparklines/sparkline.js"></script> -->
<!-- JQVMap -->
<script src="{{asset('/')}}public/dashboard/jqvmap/jquery.vmap.min.js"></script>
<script src="{{asset('/')}}public/dashboard/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="{{asset('/')}}public/dashboard/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="{{asset('/')}}public/dashboard/moment/moment.min.js"></script>
<script src="{{asset('/')}}public/dashboard/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{asset('/')}}public/dashboard/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>

<script src="{{asset('/')}}public/dashboard/datatables/jquery.dataTables.min.js"></script>
<script src="{{asset('/')}}public/dashboard/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="{{asset('/')}}public/dashboard/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{asset('/')}}public/dashboard/datatables-responsive/js/responsive.bootstrap4.min.js"></script>


<!-- Summernote -->
<script src="{{asset('/')}}public/dashboard/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="{{asset('/')}}public/dashboard/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="{{asset('/')}}public/dashboard/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->


<!-- AdminLTE for demo purposes -->
<script src="http://localhost/selflearning/frontend/assets/dist/js/demo.js"></script>



<script src="{{asset('/')}}public/dashboard/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>

<!-- input tag -->
<script src="{{asset('/')}}public/dashboard/js/bootstrap-tagsinput.min.js"></script>


<script src="{{asset('/')}}public/dashboard/chart.js/Chart.min.js"></script>
<!-- PAGE SCRIPTS -->
<script src="{{asset('/')}}public/dashboard/js/dashboard2.js"></script>
<script src="{{asset('/')}}public/dashboard/js/select2.full.min.js"></script>
<script src="{{asset('/')}}public/dashboard/js/statuschange.js"></script>

<style type="text/css">
	.label-info {
    background-color: #5bc0de;
}
.label {
    display: inline;
    padding: .2em .6em .3em;
    font-size: 75%;
    font-weight: 700;
    line-height: 1;
    color: #fff;
    text-align: center;
    white-space: nowrap;
    vertical-align: baseline;
    border-radius: .25em;
}
</style>
</body>
</html>
