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
            <h1 class="m-0 text-dark">Add Laundry Service</h1>
            <small></small>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Add Laundry Service</li>
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
                  <h2 class="card-title">Add Laundry Service</h2>
                  <br>
                  <br>
                </div>
              </div>
              <form class="cmxform" action="{{route('save-laundry-service')}}" method="post" enctype="multipart/form-data">
                  @csrf
                <fieldset>
                  <div class="form-group">
                    <label for="">Category</label>
                    <select name="category" id="" class="form-control">
                        <option value="">Select Category</option>
                        <option value="1">Men’s</option>
                        <option value="2">Women’s</option>
                        <option value="3">Children’s</option>
                        <option value="4">Household</option>
                    </select>
                  </div>
                  <div class="form-group">
                      <label for="">Service Name</label>
                    <input class="form-control"  name="service_name" required="" placeholder="Enter Service Name">
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
  