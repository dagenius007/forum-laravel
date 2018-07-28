@extends('admin.layout.app')

@section('content')


<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <a href="/admin/categories/add">Add new</a>
        <section class="content-header">
          <h1>
           Categories
          </h1>
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
                                  <th>Category</th>
                                  <th>Actions</th>
                                  <th></th>
                                </tr>
                                @foreach($channels as $channel)
                                    <tr>
                                    <td>{{ $loop->index + 1}}</td>
                                    <td>{{ $channel->name}}</td>
                                    <td><a href="/admin/categories/edit/{{ $channel->id }}" class="btn-lg btn-success">Edit</a></td>
                                    <td><a href="/admin/categories/delete/{{ $channel->id }}" class="btn-lg btn-danger">Delete</a></td>
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