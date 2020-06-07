@extends('admin.master')


@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Add Appoinment</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('admin/dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active">Add-Appoinment</li>
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
        <div class="row" style="width: 100%;">
          @if(session('success'))
            <div class="alert alert-success">
                {{session('success')}}
            </div>
          @endif
          @if (count($errors) > 0)
             <div class = "alert alert-danger">
                <ul>
                   @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                   @endforeach
                </ul>
             </div>
          @endif
        	<form action="{{ url('/admin/store-appointment') }}" method="post" style="background: #ffff; padding: 10px; width: 100%;">
        		@csrf
        	  <div class="form-row">
              <div class="col-md-12 mb-3">
                <label for="validationDefault01">Appointment Date</label>
                <input type="date" name="appointment_date" class="form-control" id="validationDefault01" placeholder="Title" autofocus>
              </div>
            </div>

            <div class="form-row">
              <div class="col-md-12 mb-3">
                <label for="validationDefault01">Appointment Time</label>
                <select class="form-control" name="appointment_time" id="sel1">
                  <option value="10-12 AM">10-11 AM</option>
                  <option value="02-04 PM">02-04 PM</option>
                  <option value="06-09 PM">06-09 PM</option>
                </select>
              </div>
            </div>
            
            <div class="form-row">
              <div class="col-md-12 mb-3">
                <label for="validationDefault01">Specialists</label>
                <select class="form-control" name="doctor_id" id="sel1">
                  
                  <option value="{{$data->id}}">{{$data->designation}} ({{$data->name}})</option>
                </select>
              </div>
            </div>
            <button class="btn btn-primary" type="submit">SAVE</button>
        	  </div>
			</form>
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  @endsection
  