@extends('admin.layout.app') 
@section('content')


<div class="content-wrapper">

  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Featured Topics</h3>


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

        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
      <div style="padding:10px">
        <form action="/admin/featuredtopics/update">
          <div class="form_group">
            <label>Number Of Featured Topic : </label>
            <input type="text" value="{{ $number }}">
            <button type="submit" class="btn btn--primary">Submit</button>
          </div>
        </form>
      </div>
    </div>
  </div>

</div>
@endsection