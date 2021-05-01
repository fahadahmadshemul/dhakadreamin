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
            <h1 class="m-0 text-dark">Add Room</h1>
            <small></small>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Add Room</li>
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
                  <h2 class="card-title">Add Room</h2>
                  <br>
                  <br>
                </div>
              </div>
              <form class="cmxform" action="{{route('save-room')}}" method="post" enctype="multipart/form-data">
                  @csrf
                <fieldset>
                  <div class="form-group">
                      <label for="">Room Title</label>
                    <input class="form-control"  name="title" required="" placeholder="Enter Room Title">
                  </div>
                  <div class="form-group">
                      <label for="">Room Sub Title</label>
                    <input class="form-control"  name="sub_title" required="" placeholder="Enter Room Sub Title">
                  </div>
                  <div class="form-group">
                    <label for="">Room Description</label>
                    <textarea class="form-control" rows="7" name="description" placeholder="Enter Room Description"></textarea>
                    <span style="color:red;font-style:italic">For Line Break Use + Sign</span>
                  </div>
                  <div class="form-group">
                      <label for="">Room Images</label>
                    <input class="form-control" type="file" name="image">
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
  