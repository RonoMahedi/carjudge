@extends('layouts/backend/app')


@section('title')
  Car Judge - Edit Car Brands
@endsection




@section('content')



  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Brands</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
              <li class="breadcrumb-item">Brands</li>
              <li class="breadcrumb-item active">Edit</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>




  <!---start admin panel---->
  <div class="container">


        <div class="float-right">

          <!-- Error message -->
          @if ($errors->any())
          <div class="alert alert-danger">
          <ul>
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
          </ul>
          </div>
          @endif


      </div>




            <!-- Main content -->
            <section class="content">
              <div class="container-fluid">
                <div class="row">
                  <!-- left column -->
                  <div class="col-md-6 mx-auto py-5">
                    <!-- general form elements -->
                    <div class="card card-primary">
                      <div class="card-header">
                        <h3 class="card-title">ADD CAR BRAND SECTION</h3>
                      </div>
                      <!-- /.card-header -->
                      <!-- form start -->
                      <form action="{{ url('/admin/brandslist/update/'.$brands->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                          <div class="form-group">
                            <label for="exampleInputEmail1">Edit Brand Name</label><small>(Maximum 15 characters) </small>
                            <input type="name" class="form-control"
                            value="{{ $brands->name }}"  name="name">
                          </div>
                          <div class="form-group">
                            <label for="exampleInputFile"> Edit Brand Image</label> <small>(Only .png file required maximum 1mb)</small>
                            <div class="input-group">
                              <div class="custom-file">
                                <input type="file" class="custom-file-input" name="image">
                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>

                              </div>

                            </div>
                            <label for="exampleInputFile"> Previous Image: </label>
                              <img src="{{ URL::to($brands->image) }}" style="height:120px; width:120px;" alt="">
                              <input type="hidden" name="old_photo" value="{{ $brands->image }}">
                          </div>

                          <button type="submit" class="btn btn-primary btn-lg mr-2">UPDATE</button>
                          <a href="{{ route('brands.show') }}" class="btn btn-danger btn-lg">CANCEL</a>
                        </div>
                        <!-- /.card-body -->




                      </form>
                    </div>
                    <!-- /.card -->

              </div>
            </div>
      </div>
      </section>
      <!-- ./wrapper -->



  </div>






    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->








@endsection
