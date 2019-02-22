@extends('admin.layout.app') 
@section('content')


<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div style="padding:10px">
    <a href="/admin/adminusers/create"  class="btn btn-success" >Add new</a>
  </div>
 
  <section class="content-header">
    <h1>Admins</h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">Tables</a></li>
      <li class="active">Simple</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-body table-responsive no-padding">
            <table class="table table-hover">
              <tr>
                <th>ID</th>
                <th>Image</th>
                <th>Name</th>
                <th>Actions</th>
              </tr>
              @foreach($adminusers as $adminuser)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td><img src="{{ $adminuser->display_img ? asset('img/users/'.$adminuser->display_img) : asset('img/users/avatar.png') }}"
                    width="100" alt="" style="border-radius:1em;"></td>
                <td>{{ $adminuser->name}}</td>
                <td><a href="/admin/adminusers/edit/{{ $adminuser->id }}" class="btn-lg btn-success">Edit</a></td>
                <td><a href="/admin/adminusers/delete/{{ $adminuser->id }}" class="btn-lg btn-danger">Delete</a></td>
              </tr>
              @endforeach
            </table>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
    </div>
  </section>
</div>
@endsection