
@extends('admin.layout.app')

@section('content')
  <!-- Left side column. contains the logo and sidebar -->
 

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
        <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    @forelse($threads as $thread)
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class='level'>
                                <h4 class='flex'>
                                    <a href='{{ $thread->path() }}'>{{ $thread->title }}</a>
                                </h4>
                                <strong>
                                    {{-- <a href={{ $thread->path()}}>{{ $thread->replies_count }} {{ str_plural('reply', $thread->replies_count)}}</a> --}}
                                </strong>
                            </div>
                        </div>
        
                        <div class="panel-body">
                            <div class='body'>
                                {{ $thread->body }}
                            </div>
                        </div>
                        <div>
                        <a href="/admin/threads/delete/{{ $thread->id }}">DELETE</a>
                        <a href="/admin/threads/replies/{{ $thread->id }}">Replies</a>
                        </div>
                    </div>
                    @empty
                    <p>There are no threads yet</p>
                    @endforelse
                </div>
            </div>
  </div>
  @endsection

{{-- </div> --}}
<!-- ./wrapper -->


