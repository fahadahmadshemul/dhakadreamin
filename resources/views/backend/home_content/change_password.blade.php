@extends('layouts.dashboard_layout')
@section('content')
    
<style>
    .error_from{
      border:1px solid red!important;
    }
  </style>
  <div class="content-wrapper" style="min-height: 1604.62px;">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Change Password</h1>
            <small></small>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Change Password</li>
            </ol>
          </div>
  
          <!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
      
      <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-10 col-10 mb-4 mx-auto">
          <div class="card">
            <div class="card-body">
                @php
                    $success = Session::get('success');
                @endphp
                @if ($success)
                    <div class="alert alert-success">{{$success}}</div>
                @endif
                @php
                    Session::put('success', NULL);
                @endphp
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
              <div class="row">
                <div class="col-md-6">
                  <h2 class="card-title">Change Password</h2>
                  <br>
                  <br>
                </div>
              </div>
              <form class="cmxform" action="{{route('update-password')}}" method="post" enctype="multipart/form-data">
                  @csrf
                <fieldset>
                  
                  <div class="form-group">
                      <label for="">New Password</label>
                      <input type="password" class="form-control" name="password">
                  </div>
                  <div class="form-group">
                      <label for="">Confirm Password</label>
                      <input type="password`" class="form-control" name="password_confirmation">
                  </div>
                  <input class="btn btn-primary" type="submit" value="Update">
                </fieldset>
              </form>
            </div>
          </div>
        </div>
      </div>
  </div>
@endsection
  