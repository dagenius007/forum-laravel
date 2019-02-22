 
<?php $__env->startSection('content'); ?>


<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="add" style="padding:10px">
    <a href="/admin/categories/create" class="btn btn-success"> <i class="fa fa-plus"></i> Add new</a>
  </div>

  

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
              <?php $__currentLoopData = $channels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $channel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <tr>
                <td style="padding:50px"><?php echo e($loop->index + 1); ?></td>
                <td><img src="<?php echo e($channel->channel_img ? asset('img/category/'.$channel->channel_img) : asset('img/category/cat_bg.jpg')); ?>"
                    style="border-radius:1em;height:100px" /></td>
                <td style="padding:50px"><?php echo e($channel->name); ?></td>
                <td style="padding:50px"><a href="/admin/categories/edit/<?php echo e($channel->id); ?>" class="btn-lg btn-success">Edit</a>
                  <a href="/admin/categories/delete/<?php echo e($channel->id); ?>" class="btn-lg btn-danger">Delete</a></td>
              </tr>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>