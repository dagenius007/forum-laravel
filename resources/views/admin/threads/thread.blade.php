
@extends('admin.layout.app')

@section('content')
  <!-- Left side column. contains the logo and sidebar -->
 

  <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <section class="content-header">
        <h1>Threads</h1>
        <ol class="breadcrumb">
            <li><a href="/admin"><i class="fa fa-dashboard"></i>Home</a></li>
            <li><a href="#">Threads</a></li>
        </ol>
    </section>
    <div class="content">

    
    <div class="row">
                <div class="col-xs-12">
                    @forelse($threads as $thread)
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class='level'>
                                <h4 class='flex'>
                                    {{ $thread->title }}
                                </h4>
                            </div>
                        </div>
        
                        <div class="panel-body">
                            <div class='body'>
                                {{ $thread->body }}
                            </div>
                        </div>
                        <div class="panel-footer">
                            <a href="/admin/threads/delete/{{ $thread->id }}" class="btn btn-danger">DELETE</a>
                            <a href="/admin/threads/replies/{{ $thread->id }}" class="btn btn-info">REPLIES</a>
                        </div>
                    </div>
                    @empty
                    <p>There are no threads yet</p>
                    @endforelse
                </div>
            </div>
  </div>
</div>
  @endsection

{{-- </div> --}}
<!-- ./wrapper -->


