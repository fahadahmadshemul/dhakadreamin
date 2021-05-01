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
            <h1 class="m-0 text-dark">Footer Community Section</h1>
            <small></small>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Footer Community Section</li>
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
                    $error = Session::get('error');
                @endphp
                @if ($success)
                    <div class="alert alert-success">{{$success}}</div>
                @endif
                @php
                    Session::put('success', NULL);
                @endphp
                @if ($error)
                    <div class="alert alert-danger">{{$error}}</div>
                @endif
                @php
                    Session::put('error', NULL);
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
                  <h2 class="card-title">Footer Community Section</h2>
                  <br>
                  <br>
                </div>
              </div>
              <form class="cmxform" action="{{route('save-footer-community-content')}}" method="post" enctype="multipart/form-data">
                  @csrf
                <fieldset>
                  <div class="form-group">
                    <label for="">Select Menu</label>
                    <select name="category" id="" class="form-control">
                        <option value="">Please Select</option>
                        <option value="1">Dhaka Dreamin’ Members</option>
                        <option value="2">Guest Referrals</option>
                        <option value="3">Gift Cards</option>
                        <option value="4">Accessibility</option>
                        <option value="5">Against Discrimination</option>
                    </select>
                  </div>
                  <div class="form-group">
                      <label for="">Title</label>
                      <input type="text" name="title" class="form-control">
                  </div>
                  <div class="form-group">
                      <label for="">Description</label>
                      <textarea name="desc" id=""class="form-control" rows="5"></textarea>
                  </div>
                  <div class="form-group">
                      <label for="">Image</label>
                      <input type="file" name="image" class="form-control">
                  </div>
                  
                  <input class="btn btn-primary" type="submit" value="Submit">
                </fieldset>
              </form>
            </div>
          </div>
        </div>
      </div>
  </div>
@endsection
  