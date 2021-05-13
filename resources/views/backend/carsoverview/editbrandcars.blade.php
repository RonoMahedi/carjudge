@extends('layouts/backend/app')

@section('title')
Car Judge - Edit Cars Overviews
@endsection


@section('content')




<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Cars Models</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item">Car Models</li>
                        <li class="breadcrumb-item active">Edit</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>




    <!---start admin panel---->
    <div class="container">



        <form action="{{ url('/admin/brands/overview/allcars/update/'.$boverviews->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">EDIT cars models info.</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">


                            <div class="row">

                                <div class="col-md-6 my-2">
                                    <div class="floating-label-form-group">
                                        <label>Choose Car Brand</label>
                                        <br>
                                        <select class="form-control text-size" name="brands_id">
                                            <option>Select</option>
                                            @foreach ($brands as $row)
                                            <option value="{{ $row->id }}" <?php if($row->id == $boverviews->brands_id)  echo "selected" ?>>{{ $row->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 my-2">
                                    <div class="floating-label-form-group">
                                        <label>Car Model</label>
                                        <br>
                                        <input type="text" value="{{ $boverviews->car_model }}" class="form-control text-size" name="car_model">
                                    </div>
                                </div>



                            </div>






                            <div class="row">
                                <div class="col-md-8 pt-3 ml-auto">
                                    <button type="submit" class="btn btn-success btn-lg mr-3">UPDATE</button>
                                    <a href="{{ route('allcaroverview') }}" class="btn btn-danger btn-lg">CANCEL</a>
                                </div>
                            </div>





        </form>

    </div>

    <div class="col-md-3">
        <!-- Success message -->
        @if(Session::has('success'))
        <div class="alert alert-success">
            {{Session::get('success')}}
        </div>
        @endif
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



</div>


</div>


</div>





</div>






<!-- /.content -->
</div>
<!-- /.content-wrapper -->










@endsection
