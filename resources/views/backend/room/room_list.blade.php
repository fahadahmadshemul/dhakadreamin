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
            <h1 class="m-0 text-dark">Room List</h1>
            <small></small>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Room List</li>
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
                                <th style="width: 5%">Serial</th>
                                <th style="width: 15%">Title</th>
                                <th style="width: 10%">Sub Title</th>
                                <th style="width: 30%">Description</th>
                                <th style="width: 10%">Image</th>
                                <th style="width: 15%">Status</th>
                                <th style="width: 15%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                          @php
                              $i=1;
                          @endphp
                          @foreach ($collection as $item)
                              <tr>
                                  <td>{{$i}}</td>
                                <td>{{$item->title}}</td>
                                <td>{{$item->sub_title}}</td>
                                
                                <td>
                                  @php
                                    echo $descriptions = substr($item->description, 0, 60).' .......';
                                  @endphp
                                </td>
                                <td>
                                  <img style="height: 60px" src="{{URL::to($item->image)}}" alt="">
                                </td>
                                <td>
                                  @php
                                      $book_date_from = $item->book_date_from;
                                      $book_date_to = $item->book_date_to;
                                      $booked_user_id = $item->booked_user_id;
                                  @endphp
                                  @if ($book_date_from == NULL || $book_date_to == NULL || $booked_user_id == NULL)
                                    <a href="{{route('inactive-room', $item->id)}}" class="btn btn-danger btn-sm">Make Inactive</a>
                                  @else
                                    <a href="{{route('active-room', $item->id)}}" class="btn btn-success btn-sm">Make Active</a>
                                  @endif
                                  
                                  
                                </td>
                                <td>
                                  <a href="{{route('edit-room', $item->id)}}" class="btn btn-info btn-xs">Edit</a>
                                  <a href="{{route('delete-room', $item->id)}}" onclick="return confirm('Are You Sure?')" class="btn btn-danger btn-xs">Delete</a>
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
  