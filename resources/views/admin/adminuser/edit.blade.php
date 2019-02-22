@extends('admin.layout.app')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Edit Admin
      </h1>
      <button class="btn btn-info" data-toggle="modal" data-target="#changePassword">Change Password</button>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Forms</a></li>
        <li class="active">General Elements</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">

        <div class="col-md-12">
  
          <div class="box box-primary">
          <form role="form" action="/admin/adminusers/update/{{ $adminuser->id }}" method="post" enctype="multipart/form-data">
              {{ csrf_field() }}
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Name</label>
                  <input type="text" class="form-control" value="{{ $adminuser->name }}" name="name">

                    @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Email</label>
                  <input type="email" class="form-control" value="{{ $adminuser->email }}" name="email">
                  
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group">
                  <label style="width: 100%;">Avatar</label>
                  <img src="{{ $adminuser->avatar ? asset('img/users/'.$adminuser->avatar) : asset('img/users/avatar.png') }}" width="200" alt="" id="adminuser-img">
                  <input type="file" class="form-control" name="avatar" id="adminuser">
                  
                    @if ($errors->has('channel'))
                        <span class="help-block">
                            <strong>{{ $errors->first('channel') }}</strong>
                        </span>
                    @endif
                </div>

                {{-- <div class="form-group">
                  <label for="exampleInputEmail1">New Password</label>
                  <input type="password" class="form-control" value="" name="password" placeholder="Not necessary">
            
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Confirm Password</label>
                  <input type="password" class="form-control" value="" name="password_confirmation" placeholder="Not necessary"> --}}
                  
                    {{-- @if ($errors->has('cpassword'))
                        <span class="help-block">
                            <strong>{{ $errors->first('cpassword') }}</strong>
                        </span>
                    @endif --}}
                </div>
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Edit</button>
              </div>
            </form>
          </div>
          
  
      </div>
      <!-- /.row -->

      <div class="modal fade" id="changePassword" role="dialog">
        <div class="modal-dialog">
        
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Change Password
                    </h3>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form action="/admin/adminusers/updatepassword/{{ $adminuser->id }}" method="post" id="myform">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <input type="text" name="password" class="form-control" placeholder="Password" required>  
                        </div>
                        <div class="form-group">
                                <input type="text" name="password_confirmation" class="form-control" placeholder="Confirm Password" required>  
                            </div>
                        <div class="submit">
                            <button type="submit" class="btn btn--gradient btn--primary" id="subscribe">CHANGE</button>
                        </div>
                    </form>
                </div>
                {{-- <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal" style="border:1px solid red">Close</button>
                </div> --}}
            </div>
        
        </div>
    </div>

    </section>
    <!-- /.content -->
  </div>

  

@endsection