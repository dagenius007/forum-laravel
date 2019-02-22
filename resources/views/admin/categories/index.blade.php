@extends('admin.layout.app') 
@section('content')


<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="add" style="padding:10px">
    <a href="/admin/categories/create" class="btn btn-success"> <i class="fa fa-plus"></i> Add new</a>
  </div>

  {{--
  <p><a href="/threads/create" data-toggle="tooltip" data-placement="left" title="Add new"><i class="fa fa-plus"></i></a></p>
  --}}

  <section class="content-header">
    <h1>
      Categories
    </h1>
    <ol class="breadcrumb">
      <li><a href="/admin"><i class="fa fa-dashboard"></i>Home</a></li>
      <li><a href="#">Categories</a></li>
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
                <th>Category</th>
                <th>Category Image</th>
                <th>Actions</th>
                <th></th>
              </tr>
              @foreach($channels as $channel)
              <tr>
                <td style="padding:50px">{{ $loop->index + 1}}</td>
                <td><img src="{{ $channel->channel_img ? asset('img/category/'.$channel->channel_img) : asset('img/category/cat_bg.jpg') }}"
                    style="border-radius:1em;height:100px" /></td>
                <td style="padding:50px">{{ $channel->name}}</td>
                <td style="padding:50px"><a href="/admin/categories/edit/{{ $channel->id }}" class="btn-lg btn-success">Edit</a>
                  <a href="/admin/categories/delete/{{ $channel->id }}" class="btn-lg btn-danger">Delete</a></td>
              </tr>
              @endforeach


            </table>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
    </div>
    <!-- /.row -->

  </section>
  <!-- /.content -->
</div>
@endsection