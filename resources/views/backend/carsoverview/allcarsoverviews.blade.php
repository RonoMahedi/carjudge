@extends('layouts/backend/app')

@section('title')
  Car Judge - All Cars Overviews
@endsection



@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Cars Models</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
              <li class="breadcrumb-item active">Car Models</li>
              <li>
                <!-- SEARCH FORM -->
                <form class="form-inline ml-3" action="{{ url('/admin/brands/overview/allcars/search') }}" method="get">
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




  <!---start admin panel---->
  <div class="container">




      <div class="row my-3">


    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

        <table class="table table-responsive">

          <tr>
            <th>SL</th>
            <th>Car Brand</th>
            <th>Car Model</th>
            <th>Action</th>
          </tr>

      @foreach ($boverviews as $row)
          <tr>
            <td>{{ $row->id }}</td>
            <td>{{ $row->name }}</td>
            <td>{{ $row->car_model }}</td>
            <td>
              <a href="{{ URL::to('/admin/brands/overview/allcars/edit/'.$row->id) }}" class="btn btn-sm btn-info">Edit</a>
              <a href="{{ URL::to('/admin/brands/overview/allcars/delete/'.$row->id) }}" class="btn btn-sm btn-danger">Delete</a>
            </td>
          </tr>

          @endforeach

        </table>


{{ $boverviews->links() }}

         </div>
       </div>
    </div>



  </div>















@endsection
