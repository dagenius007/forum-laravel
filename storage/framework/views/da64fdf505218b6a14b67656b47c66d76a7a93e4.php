 
<?php $__env->startSection('content'); ?>


<div class="content-wrapper">

  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Featured Topics</h3>


          <div class="box-tools">
            <div class="input-group input-group-sm" style="width: 150px;">
              

              <div class="input-group-btn">
                
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
            <label>Number Of Featured Topic</label>
            <input type="text" value="<?php echo e($number); ?>">
            <button type="submit" class="btn btn--primary">Submit</button>
          </div>
        </form>
      </div>
    </div>
  </div>

</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>