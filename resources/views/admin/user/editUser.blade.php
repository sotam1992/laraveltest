@extends('admin.master')


@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Edit User</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('admin/dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active">Edit-User</li>
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
        	<form action="{{ url('/admin/update-user') }}" method="post" style="background: #ffff; padding: 10px; width: 100%;">
        		@csrf
        	  <div class="form-row">
              <div class="col-md-12 mb-3">
                <label for="validationDefault01">Name</label>
                <input type="text" name="name" value="{{ $data->name }}" class="form-control" id="validationDefault01" placeholder="Title" autofocus>
              </div>
            </div>
            <div class="form-row">
              <div class="col-md-12 mb-3">
                <label for="validationDefault01">Email</label>
                <input type="text" name="email" value="{{ $data->email }}" class="form-control" id="validationDefault01" placeholder="Title" autofocus readonly="">
              </div>
            </div>
            <div class="form-row">
              <div class="col-md-12 mb-3">
                <label for="validationDefault01">Role</label>
                <input type="text" value="{{ $data->role }}" class="form-control" id="validationDefault01" placeholder="Title" autofocus readonly="">
              </div>
            </div>
            <div class="form-row">
              <div class="col-md-12 mb-3">
                <label for="validationDefault01">Mobile</label>
                <input type="text" name="mobile" value="{{ $data->mobile }}" class="form-control" id="validationDefault01" placeholder="Mobile" autofocus>
              </div>
            </div>
            @if(Auth::user()->role =='Doctor' )
            <div class="form-row">
              <div class="col-md-12 mb-3">
                <label for="validationDefault01">Fees</label>
                <input type="text" name="fees" value="{{ $data->fees }}" class="form-control" id="validationDefault01" placeholder="Title" autofocus>
              </div>
            </div>
            <div class="form-row">
              <div class="col-md-12 mb-3">
                <label for="validationDefault01">Specialists</label>
                <select class="form-control" name="designation" id="sel1">
                  <option value="Cardiologists" {{('Cardiologists'==$data->role)? 'selected':''}}>Cardiologists</option>
                  <option value="Dermatologists" {{('Dermatologists'==$data->role)? 'selected':''}}>Dermatologists</option>
                  <option value="Endocrinologists" {{('Endocrinologists'==$data->role)? 'selected':''}}>Endocrinologists</option>
                  <option value="Family Physicians" {{('Family Physicians'==$data->role)? 'selected':''}}>Family Physicians</option>
                </select>
              </div>
            </div>
            @endif
            <div class="form-row">
              <div class="col-md-12 mb-3">
                <label for="validationDefault01">Address</label>
                <textarea class="form-control" name="address" rows="5" id="comment">{{$data->address}}</textarea>
              </div>
            </div>
            <button class="btn btn-primary" type="submit">Update</button>
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
  