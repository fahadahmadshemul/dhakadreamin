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
            <h1 class="m-0 text-dark">Menu</h1>
            <small></small>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Menu</li>
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
                  <h2 class="card-title">Menu</h2>
                  <br>
                  <br>
                </div>
              </div>
              <form class="cmxform" action="{{route('update-contact')}}" method="post" enctype="multipart/form-data">
                  @csrf
                <fieldset>
                  
                  <div class="form-group">
                      <label for="">Address</label>
                      <textarea name="address" id="" class="form-control">{{$contact->address}}</textarea>
                  </div>
                  <div class="form-group">
                      <label for="">Phone</label>
                    <input type="text" class="form-control" name="phone" value="{{$contact->phone}}">
                  </div>
                  <div class="form-group">
                      <label for="">Whatsapp</label>
                    <input type="text" class="form-control" name="whatsapp" value="{{$contact->whatsapp}}">
                  </div>
                  <div class="form-group">
                      <label for="">Skype</label>
                    <input type="text" class="form-control" name="skype" value="{{$contact->skype}}">
                  </div>
                  <div class="form-group">
                      <label for="">Email</label>
                    <input type="text" class="form-control" name="email" value="{{$contact->email}}">
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
  