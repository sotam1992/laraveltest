@extends('admin.master')


@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Appointment List</h1>
        </a>
          </div><!-- /.col -->

          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('admin/dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active">Appointment- List</li>
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
                <th scope="col">Patient Name</th>
                <th scope="col">Doctor Name</th>
                <th scope="col">Specialist</th>
                <th scope="col">Appoinment Date</th>
                <th scope="col">Appoinment Time</th>
                @if(Auth::user()->role =='Doctor' )
                <th scope="col">Patient Contact</th>
                @endif
                @if(Auth::user()->role =='Patient' )
                <th scope="col">Doctor Contact</th>
                <th scope="col">Action</th>
                @endif
              </tr>
            </thead>
            <tbody>
              @foreach($data as $rows)
              <tr>
                <td>{{$rows->patient_name}}</td>
                <td>{{$rows->doctor_name}}</td>
                <td>{{$rows->designation}}</td>
                <td>{{$rows->appointment_date}}</td>
                <td>{{$rows->appointment_time}}</td>
                @if(Auth::user()->role =='Doctor' )
                <td>{{$rows->paitent_mobile}}</td>
                @endif
                @if(Auth::user()->role =='Patient' )
                <td>{{$rows->doctor_mobile}}</td>
                <td>
                  <a href="{{URL::to('/admin/edit-appointment')}}/{{ $rows->id }}" class="btn btn-primary">Edit</a>
                  <a onclick="return confirm('Are you sure to delete this item?')" href="{{URL::to('/admin/delete-appointment')}}/{{$rows->id}}" class="btn btn-danger">Delete</a>
                </td>
                @endif
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
  