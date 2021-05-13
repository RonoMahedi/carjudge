@extends('layouts.frontend.header')

@section('title')
  Car Judge - All Cars Brands Are Here
@endsection

@section('content')


<div class="color">


<section class="inventory" id="inventory">
<!--- brands part start--->


  <div class="container">

  <!---section title--->
      <div class="row mb-5">
        <div class="col d-flex flex-wrap justify-content-center">
          <h1 class="font-weight-bold align-self-center mx-1 texting">Car Judge</h1>
          <h1 class="section-title-special mx-1 texting">Inventory</h1>
        </div>
      </div>
  <!---brands---->
  <div class="row">

      @foreach ($brands as $row)
    <!--single brand--->
    <div class="col-4 col-sm-4 col-md-3 col-lg-2">
        <a href="#">
          <img data-placement="bottom"
          data-toggle="tooltip" title="{{ $row->name }}"
          src="{{ URL::to($row->image) }}" class="card-img-top car-img-in"
          alt="{{ $row->name }}">
        </a>
    </div>
    @endforeach




    </div>
  </div>

  <!----end inventory sction--->



</section>

</div>




@endsection
