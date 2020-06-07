@extends('admin.master')


@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">User List</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('admin/dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active">User- List</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content" style="margin-left: 20px;">
      <div class="container-fluid">
        
        <!-- Small boxes (Stat box) -->
        <div class="row" style="width: 100%; margin-top: 10px;">
          @if(session('success'))
            <div class="alert alert-success">
                {{session('success')}}
            </div>
          @endif
        	 <table class="table">
            <thead>
              <tr>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Role</th>
                <th scope="col">Mobile</th>
                @if(Auth::user()->role =='Doctor' )
                <th scope="col">Fees</th>
                @endif
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($data as $rows)
              <tr>
                <td>{{$rows->name}}</td>
                <td>{{$rows->email}}</td>
                <td>{{$rows->role}}</td>
                <td>{{$rows->mobile}}</td>
                @if(Auth::user()->role =='Doctor' )
                <td>{{$rows->fees}}</td>
                @endif
                <td>
                  <a href="{{URL::to('/admin/edit-user')}}" class="btn btn-primary">Edit</a>
                </td>
              </tr>
              @endforeach
              
            </tbody>
          </table>
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  @endsection
  