@extends('layouts/backend/app')



@section('title')
Car Judge - Add Cars Overviews
@endsection


@section('content')




<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Add Cars Models</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item">Cars Models</li>
                        <li class="breadcrumb-item active">Add</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>




    <!---start admin panel---->
    <div class="container">




        <form action="{{ route('caroverviewstore') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card card-info">

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
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


                            <div class="row">

                                <div class="col-md-6 my-2">
                                    <div class="floating-label-form-group">
                                        <label>Choose Car Brand</label>
                                        <br>
                                        <select class="form-control text-size" name="brands_id">
                                            <option selected="" disabled="">Select</option>
                                            @foreach ($brands as $row)
                                            <option value="{{ $row->id }}">{{ $row->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 my-2">
                                    <div class="floating-label-form-group">
                                        <label>Car Model</label>
                                        <br>
                                        <input type="text" value="{{ old('car_model') }}" class="form-control text-size" name="car_model">
                                    </div>
                                </div>



                            </div>




                            <div class="row">
                                <div class="col-md-8 pt-3 ml-auto">
                                    <button type="submit" class="btn btn-success btn-lg mr-3">SUBMIT</button>
                                    <a href="{{ route('dashboard') }}" class="btn btn-danger btn-lg">CANCEL</a>
                                </div>
                            </div>





        </form>

    </div>


</div>
</div>









</div>





</div>


<!----container wraper---->
</div>




@endsection
