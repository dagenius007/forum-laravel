<?php $__env->startSection('content'); ?>
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
            <?php $__empty_1 = true; $__currentLoopData = $replies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reply): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <div class="panel panel-default">
        
                        <div class="panel-body">
                            <div class='body'>
                                <?php echo e($reply->body); ?>

                            </div>
                        </div>
                        <div class="panel-footer">
                            <a href="/admin/threads/replies/delete/<?php echo e($reply->id); ?>" class="btn btn-danger">DELETE</a>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <p>There are no replies yet</p>
                    <?php endif; ?>
                </div>
            </div>
  </div>
  </div>
  <?php $__env->stopSection(); ?>


<!-- ./wrapper -->



<?php echo $__env->make('admin.layout.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>