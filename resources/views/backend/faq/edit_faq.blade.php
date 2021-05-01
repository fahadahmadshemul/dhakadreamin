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
            <h1 class="m-0 text-dark">Edit FAQ</h1>
            <small></small>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Edit FAQ</li>
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
                  <h2 class="card-title">Edit FAQ</h2>
                  <br>
                  <br>
                </div>
              </div>
              <form class="cmxform" action="{{route('update-faq', $edit->id)}}" method="post" enctype="multipart/form-data">
                  @csrf
                <fieldset>
                  <div class="form-group">
                    <label for="">Category</label>
                    <select name="category" id="" class="form-control">
                      <option value="">Selcet Category</option>
                      <option <?php if($edit->category  == 1) echo 'selected'; ?> value="1">Airport Pick Up/Drop Off</option>
                      <option <?php if($edit->category  == 2) echo 'selected'; ?> value="2">Full Day Car Rental</option>
                      <option <?php if($edit->category  == 3) echo 'selected'; ?> value="3">Bicycle Rental</option>
                    </select>
                  </div>
                  <div class="form-group">
                      <label for="">Question</label>
                    <input class="form-control"  name="question" value="{{$edit->question}}" required="" placeholder="Enter Service Name">
                  </div>
                  <div class="form-group">
                      <label for="">Answer</label>
                    <textarea name="ans" class="form-control" id="">{{$edit->ans}}</textarea>
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
  