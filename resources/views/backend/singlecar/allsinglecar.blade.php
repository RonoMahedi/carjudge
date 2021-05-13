@extends('layouts/backend/app')

@section('title')
  Car Judge - All car Details
@endsection



@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Cars Overviews</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
              <li class="breadcrumb-item active">Car Details</li>
              <li>
                <!-- SEARCH FORM -->
                <form class="form-inline ml-3" action="{{ url('/admin/brands/singlecar/allcars/search') }}" method="get">
                  <div class="input-group input-group-sm">
                    <input class="form-control form-control-navbar" name="search" type="search" placeholder="Search" aria-label="Search">
                    <div class="input-group-append">
                      <button class="btn btn-navbar" type="submit">
                        <i class="fas fa-search"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

  <div class="row my-3">


    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

        <table class="table table-responsive">

          <tr>
            <th>SL</th>
            <th>Car Brand</th>
            <th>Car Model</th>
            <th>Fuel</th>
            <th>Engine cc</th>
            <th>Car Price</th>
            <th>Body Type</th>
            <th>Transmission</th>
            <th>Max Power</th>
            <th>Year</th>
            <th>Seat no</th>
            <th>Car Image</th>
            <th>Action</th>
          </tr>

      @foreach ($singlecar as $row)
          <tr>
            <td>{{ $row->id }}</td>
            <td>{{ $row->name }}</td>
            <td>{{ $row->car_model }}</td>
            <td>{{ $row->fuel_type}}</td>
            <td>{{ $row->engine }}</td>
            <td>{{ $row->car_price }}</td>
            <td>{{ $row->body_type }}</td>
            <td>{{ $row->transmission }}</td>
            <td>{{ $row->max_power }}</td>
            <td>{{ $row->year }}</td>
            <td>{{ $row->seat }}</td>
            <td><img src="{{ URL::to($row->car_image) }}" style="width:70px; height:60px;" alt=""></td>
            <td>
              <a href="{{ url('/admin/brands/singlecar/edit/'.$row->id) }}" class="btn btn-sm btn-info">Edit</a>
              <a href="{{ url('/admin/brands/singlecar/'.$row->id) }}" class="btn btn-sm btn-success">View</a>
              <a href="{{ url('/admin/brands/singlecar/delete/'.$row->id) }}" class="btn btn-sm btn-danger">Delete</a>
            </td>
          </tr>

          @endforeach

        </table>

{{ $singlecar->links() }}



         </div>
       </div>
    </div>













@endsection
