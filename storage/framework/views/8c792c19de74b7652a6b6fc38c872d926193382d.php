 
<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="searchpage">
                <div class="searchpage__header">
                    <div>
                        <p class="searchpage__header--title">Search for Keywords "<?php echo e(ucfirst($q)); ?>"</p>
                        <p>Found <?php echo e(count($results)); ?></p>
                    </div>
                    <div class="searchpage__header--input">
                        <form action="/search" method="post">
                            <?php echo e(csrf_field()); ?>

                            <div class="search__input">
                                <input type="text" name="search" placeholder="Search">
                                <button type="submit"><i class="fa fa-search"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
                <?php $__currentLoopData = $results; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $result): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="searchpage__result">
                    <div class="col-md-4">
                        <img class="search__result--img" src="<?php echo e(asset('img/'.$result->thread_img)); ?>" alt="">
                    </div>
                    <div class="col-md-8 searchpage__details">
                        <div class="">
                            <div class="searchpage__title">
                                <a href=""> <?php echo e($result->title); ?> by <span><?php echo e($result->creator->name); ?></span></a>
                            </div>
                            <div class="searchpage__body">
                                <?php echo e($result->body); ?>

                            </div>
                            <div class="searchpage__footer">
                                <p><i><?php echo e($result->channel->name); ?></i></p>
                                <p><?php echo e($result->created_at); ?></p>
                            </div>
                        </div>
                    </div>

                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <?php echo e($results); ?>

        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>