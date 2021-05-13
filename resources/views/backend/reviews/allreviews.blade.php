@extends('layouts/backend/app')

@section('title')
  Car Judge - All Reviews 
@endsection


@section('content')



  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Cars Reviews</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
              <li class="breadcrumb-item active">Car Reviews</li>
              <li>
                <!-- SEARCH FORM -->
                <form class="form-inline ml-3" action="{{ url('/admin/allreviews/search') }}" method="get">
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


    </div>

      <div class="row my-3">


    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

        <table class="table table-responsive">

          <tr>
            <th>SL</th>
            <th>Name</th>
            <th>City</th>
            <th>Email</th>
            <th>Action</th>
          </tr>

      @foreach ($reviews as $row)
          <tr>
            <td>{{ $row->user_id }}</td>
            <td>{{ $row->name }}</td>
            <td>{{ $row->city }}</td>
            <td>{{ $row->email }}</td>
            <td>
              <a href="{{ url('/admin/allreviews/details/'.$row->user_id) }}" class="btn btn-sm btn-success">Details</a>
            </td>
          </tr>

          @endforeach

        </table>

{{ $reviews->links() }}


         </div>
       </div>
    </div>



  </div>






    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->













@endsection
