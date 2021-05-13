@extends('layouts/backend/app')

@section('title')
  Car Judge - Regiters Users Details
@endsection


@section('content')


  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
          <div class="container-fluid">
              <div class="row mb-2">
                  <div class="col-sm-6">
                      <h1>Users Details</h1>
                  </div>
                  <div class="col-sm-6">
                      <ol class="breadcrumb float-sm-right">
                          <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                          <li class="breadcrumb-item active">Users</li>

                      </ol>
                      <form class="form-inline ml-3" action="{{ url('/admin/users/search') }}" method="get">
                        <div class="input-group input-group-sm">
                          <input class="form-control form-control-navbar" name="userssearch" type="search" placeholder="Search" aria-label="Search">
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

      <div class="container">

      <h4>Users Lists</h4>

        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

            <table class="table table-responsive">

              <tr>
                <th>SL</th>
                <th>User Name</th>
                <th>User Email</th>
                <th>Mobile Number</th>
                <th>User type</th>
              </tr>

          @foreach ($users as $row)
              <tr>
                <td>{{ $row->id }}</td>
                <td>{{ $row->name }}</td>
                <td>{{ $row->email }}</td>
                <td>{{ $row->phone }}</td>
                <td>{{ $row->usertype }}</td>
              </tr>

              @endforeach

            </table>

{{ $users->links() }}


     </div>

   </div>

</div>
@endsection
