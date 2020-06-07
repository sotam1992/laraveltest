@extends('admin.master')


@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Specialist List</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('admin/dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active">specialist- List</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content" style="margin-left: 20px;">
      <div class="container">
        
        <!-- Small boxes (Stat box) -->
        <form action="{{ url('/admin/search-specialist') }}" method="post">
          @csrf
            <div class="row">
              <div class="col-md-4 mb-3">
                <label for="validationDefault01">Search</label>
                <select class="form-control" name="designation" id="sel1">
                  <option value="Cardiologists">Cardiologists</option>
                  <option value="Dermatologists">Dermatologists</option>
                  <option value="Dermatologists">Endocrinologists</option>
                  <option value="Endocrinologists">Family Physicians</option>
                </select>
              </div>
              <div class="col-md-2" style="margin-top: 32px;">
                <button class="btn btn-primary" type="submit">Search</button>
              </div>
            </div>
          </form>
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
                <th scope="col">Specialist</th>
                <th scope="col">Mobile</th>
                <th scope="col">Fees</th>
                <th scope="col">Address</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($data as $rows)
              <tr>
                <td>{{$rows->name}}</td>
                <td>{{$rows->email}}</td>
                <td>{{$rows->designation}}</td>
                <td>{{$rows->mobile}}</td>
                <td>{{$rows->fees}}</td>
                <td>{{$rows->address}}</td>
                <td>
                  <a href="{{URL::to('/admin/add-appointment')}}/{{$rows->id}}" class="btn btn-primary">Book Appointment</a>
                </td>
              </tr>
              @endforeach
              
            </tbody>
          </table>
          {{$data->links()}}
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  @endsection
  