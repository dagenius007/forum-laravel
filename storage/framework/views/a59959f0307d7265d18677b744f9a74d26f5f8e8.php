<?php $__env->startSection('content'); ?>
  <!-- Left side column. contains the logo and sidebar -->
 

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
        <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <?php $__empty_1 = true; $__currentLoopData = $threads; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $thread): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class='level'>
                                <h4 class='flex'>
                                    <a href='<?php echo e($thread->path()); ?>'><?php echo e($thread->title); ?></a>
                                </h4>
                                <strong>
                                    
                                </strong>
                            </div>
                        </div>
        
                        <div class="panel-body">
                            <div class='body'>
                                <?php echo e($thread->body); ?>

                            </div>
                        </div>
                        <div>
                        <a href="/admin/threads/delete/<?php echo e($thread->id); ?>">DELETE</a>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <p>There are no threads yet</p>
                    <?php endif; ?>
                </div>
            </div>
  </div>
  <?php $__env->stopSection(); ?>


<!-- ./wrapper -->



<?php echo $__env->make('admin.layout.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>