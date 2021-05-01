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
            <h1 class="m-0 text-dark">Footer About Content List</h1>
            <small></small>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Footer About Content List</li>
            </ol>
          </div>
  
          <!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
      
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-12 ">
            <div class="card">
                <div class="card-body">
                  <div class="row">
                    <div class="col-12">
                      <table id="example1" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>Serial</th>
                                <th>Category</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                          @php
                              $i=1;
                          @endphp
                          @foreach ($collection as $item)
                              <tr>
                                  <td>{{$i}}</td>
                                <td>
                                    @if ($item->category == 1)
                                    How Dhaka Dreamin’ Works
                                    @elseif($item->category == 2)
                                    Dhaka Dreamin’ for Homestay
                                    @elseif($item->category == 3)
                                    Dhaka Dreamin’ for Business
                                    @elseif($item->category == 4)
                                    Newsroom
                                    @elseif($item->category == 5)
                                    Founders’ Letter
                                    @endif
                                </td>
                                <td>{{$item->title}}</td>
                                <td>{{$item->desc}}</td>
                                <td>
                                    <img style="height: 60px;" src="{{URL::to($item->image)}}" alt="">
                                </td>
                                <td>
                                  <a href="{{route('edit-footer-about-content', $item->id)}}" class="btn btn-info btn-xs">Edit</a>
                                  <a href="{{route('delete-footer-about-content', $item->id)}}" onclick="return confirm('Are You Sure?')" class="btn btn-danger btn-xs">Delete</a>
                                </td>
                            </tr>
                            @php
                                $i++;
                            @endphp
                          @endforeach
                            
                    </table>
                    </div>
                  </div>
                </div>
              </div>
        </div>
      </div>
  </div>
@endsection
  