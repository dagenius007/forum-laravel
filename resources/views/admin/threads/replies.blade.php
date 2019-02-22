
@extends('admin.layout.app')

@section('content')
  <!-- Left side column. contains the logo and sidebar -->
 

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <section class="content-header">
        <h1>Replies</h1>
        <ol class="breadcrumb">
            <li><a href="/admin"><i class="fa fa-dashboard"></i>Home</a></li>
            <li><a href="#">Replies</a></li>
        </ol>
    </section>
    <div class="content">
    <div class="row">
         <div class="col-xs-12">
            @forelse($replies as $reply)
                <div class="panel panel-default">
        
                        <div class="panel-body">
                            <div class='body'>
                                {{ $reply->body }}
                            </div>
                        </div>
                        <div class="panel-footer">
                            <a href="/admin/threads/replies/delete/{{ $reply->id }}" class="btn btn-danger">DELETE</a>
                        </div>
                    </div>
                    @empty
                    <p>There are no replies yet</p>
                    @endforelse
                </div>
            </div>
  </div>
  </div>
  @endsection

{{-- </div> --}}
<!-- ./wrapper -->


