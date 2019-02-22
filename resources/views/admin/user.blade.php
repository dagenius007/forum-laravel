@extends('admin.layout.app') 
@section('content')


<div class="content-wrapper">

  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Users</h3>

          <?php $activities = Activity::users()->get(); ?>
          <div class="box-tools">
            <div class="input-group input-group-sm" style="width: 150px;">
              {{-- <input type="text" name="table_search" class="form-control pull-right" placeholder="Search"> --}}

              <div class="input-group-btn">
                {{-- <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button> --}}
              </div>
            </div>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body table-responsive no-padding">
          <table class="table table-hover">
            <tr>
              <th>ID</th>
              <th>User</th>
              <th>Profile Picture</th>
              <th>Joined</th>
              <th>Status</th>
              <th>Actions</th>
            </tr>
            @foreach($users as $user)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $user->name }}</td>
              <td><img src="{{ $user->display_img ? asset('img/users/'.$user->display_img) : asset('img/users/avatar.png') }}"
                  width="100" alt="" style="border-radius:1em;"></td>
              <td>{{ $user->created_at }}</td>
              <td><span class="{{ $activities->contains($user->name) ? 'btn btn-success' : 'btn btn-danger'}}">{{ $activities->contains($user->name) ? 'Online' : 'Offline' }}</span></td>
              <td>
                @if($user->blocked == 0)
                  <a class="btn btn-danger" href="/admin/users/block/{{ $user->id }}">Block</a> 
                @elseif( $user->blocked == 1 )
                  <a class="btn btn-danger" href="/admin/users/unblock/{{ $user->id }}">Unblock</a> 
                @endif
              </td>
            </tr>
            @endforeach
          </table>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
  </div>

</div>
@endsection