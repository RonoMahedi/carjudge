@extends('layouts.backend.app')

@section('title')
  Car Judge - Admin Welcome Page
@endsection





@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Hi Admin!</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
            </ol>
            <form class="form-inline ml-3" action="{{ url('/admin/dashboard/search') }}" method="get">
              <div class="input-group input-group-sm">
                <input class="form-control form-control-navbar" name="search" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                  <button class="btn btn-navbar" type="submit">
                    <i class="fas fa-search"></i>
                  </button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>




<!---start admin panel---->
<div class="container">
<div class="row">
    <h2>Subscriber Lists</h2>
    <div class="col-lg-12 col-md-12 col-sm-12 ">

        <table class="table table-responsive">

          <tr>
            <th>SL</th>
            <th>Sender Name</th>
            <th>Sender Email</th>
          </tr>

      @foreach ($subscribe as $row)
          <tr>
            <td>{{ $row->id }}</td>
            <td>{{ $row->name }}</td>
            <td>{{ $row->email }}</td>
          </tr>

          @endforeach

        </table>

  {{ $subscribe->links() }}


  </div>

</div>




<br><br><br>

<h2>Mail Sender Lists</h2>
<div class="row">


    <div class="col-lg-12col-md-12 col-sm-12 col-12">

      <table class="table table-responsive">

        <tr>
          <th>SL</th>
          <th>Sender Name</th>
          <th>Sender Email</th>
          <th>Sender phone</th>
          <th>Sender Email</th>
          <th>Sender Message</th>
        </tr>

    @foreach ($contact as $row)
        <tr>
          <td>{{ $row->id }}</td>
          <td>{{ $row->name }}</td>
          <td>{{ $row->email }}</td>
          <td>{{ $row->phone }}</td>
          <td>{{ $row->subject }}</td>
          <td>{{ $row->message }}</td>
        </tr>

        @endforeach

      </table>

{{ $contact->links() }}

</div>



</div>

</div>














</div>



@endsection
