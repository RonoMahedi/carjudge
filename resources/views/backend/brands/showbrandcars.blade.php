@extends('layouts/backend/app')




@section('title')
  Car Judge - Show Car Brands
@endsection


@section('content')


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>All Brands</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item active">Brands</li>
                <li>
                  <!-- SEARCH FORM -->
                  <form class="form-inline ml-3" action="{{ url('/admin/brandslist/search') }}" method="get">
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


        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 ml-auto">

              <table class="table table-responsive">
                <tr>
                  <th>SL</th>
                  <th>Brand name</th>
                  <th>Image</th>
                  <th>Action</th>
                </tr>
                @foreach ($brands as $row)
                  <tr>
                    <td>{{ $row->id }}</td>
                    <td>{{ $row->name }}</td>
                    <td><img src="{{ URL::to($row->image) }}" style="width:70px; height:60px;"></td>
                    <td>
                      <a href="{{ URL::to('/admin/brandslist/edit/'.$row->id) }}" class="btn btn-info">Edit</a>
                      <a href="{{ URL::to('/admin/brandslist/'.$row->id) }}" class="btn  btn-danger">Delete</a>
                    </td>
                  </tr>
                @endforeach

              </table>


{{ $brands->links() }}

               </div>
             </div>
          </div>


  </div>






      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->










@endsection
