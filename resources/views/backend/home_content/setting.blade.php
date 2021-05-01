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
            <h1 class="m-0 text-dark">Setting</h1>
            <small></small>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Setting</li>
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
                  <h2 class="card-title">Setting</h2>
                  <br>
                  <br>
                </div>
              </div>
              <form class="cmxform" action="{{route('update-setting')}}" method="post" enctype="multipart/form-data">
                  @csrf
                <fieldset>
                  
                  <div class="form-group">
                      <label for="">Site Logo</label>
                      <br>
                      <img style="height: 60px" src="{{URL::to($setting->site_logo)}}" alt="">
                    <input type="file" class="form-control"  name="site_logo">
                  </div>
                  <div class="form-group">
                      <label for="">Dashboard Logo</label>
                      <br>
                      <img style="height: 60px" src="{{URL::to($setting->dashboard_logo)}}" alt="">
                      <input type="file"  class="form-control"  name="dashboard_logo">
                  </div>
                  <div class="form-group">
                      <label for="">Cover Image</label>
                      <br>
                      <img style="height: 60px" src="{{URL::to($setting->cover_image)}}" alt="">
                      <input type="file"  class="form-control"  name="cover_image">
                  </div>
                  <div class="form-group">
                      <label for="">App Video URL</label>
                      <br>
                      <iframe style="width: 100px" src="{{URL::to($setting->app_video)}}" frameborder="0"></iframe>
                      <input type="text" class="form-control" value="{{$setting->app_video}}" name="app_video">
                      <span style="font-style: italic;color:red;">Example: https://www.youtube.com/embed/ux-wbgMA20g</span>
                  </div>
                  <div class="form-group">
                      <label for="">App Photo</label>
                      <br>
                      <img src="{{URL::to($setting->app_photo)}}" style="height: 60px;" alt=""> 
                      <input type="file" name="app_photo" class="form-control">
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
  