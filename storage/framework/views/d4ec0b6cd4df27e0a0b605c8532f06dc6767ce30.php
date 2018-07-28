<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"></div>

                <div class="panel-body">
                    <form method="POST" action='/completeprofile' enctype="multipart/form-data">
                        <?php echo e(csrf_field()); ?>


                        <div class='form-group'>
                           
                            <input class='form-control' name="display_img" type="file" required>
                        </div>

                        <div class='form-group'>
                            <textarea name="" id="" cols="30" rows="10"></textarea>
                            
                        </div>

                        <div class='form-group'>
                            <button type='submit' class='btn btn-primary'>Publish</button>
                        </div>
                        <?php if(count($errors)): ?>
                            <ul class='alert alert-danger'>
                                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><?php echo e($error); ?></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        <?php endif; ?>
                    </form>
                    <button class="btn">SKIP</button>

                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>