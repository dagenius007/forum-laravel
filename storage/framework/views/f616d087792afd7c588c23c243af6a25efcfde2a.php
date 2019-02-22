<?php $__env->startSection('content'); ?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Categories
      </h1>
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
          <form role="form" action="/admin/categories/update/<?php echo e($channel->id); ?>" method="post" enctype="multipart/form-data">
              <?php echo e(csrf_field()); ?>

              <div class="box-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Category</label>
                  <div class="row">
                    <div class="col-md-4">
                        <input type="text" class="form-control" value="<?php echo e($channel->name); ?>" name="channel">
                        <?php if($errors->has('channel')): ?>
                            <span class="help-block">
                                <strong><?php echo e($errors->first('channel')); ?></strong>
                            </span>
                        <?php endif; ?>
                    </div>
                    <div class="col-md-4">
                        <input type="file" class="form-control" name="channel_img">
                    </div>
                    <div class="col-md-4">
                        
                            <button type="submit" class="btn btn-primary">Edit</button>
                          
                    </div>
                  </div>
                  
                  
                    
                </div>
              
            </form>
          </div>
          
  
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>