<?php $__env->startSection('content'); ?>

<?php if(Session::has('message')): ?>
    <script>toastr.success('<div><i class="em em-slightly_smiling_face"></i> We are happy to have you here. </div>')</script>
    <script>toastr.success('<div>Feel free to create threads and edit your profile</div>')</script>
<?php endif; ?>

<div class="container home height">
    <div class="row">
        
        <div class="col-md-9">
                <div class="home-top">
                    <h1 class="header">CATEGORIES</h1>
                    <p><a href="/threads/create" data-toggle="tooltip" data-placement="left" title="Create Thread"><i class="fa fa-plus"></i></a></p>
                </div>
                <?php $__currentLoopData = $channels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $channel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-md-4 ">
                        <a href="/threads/<?php echo e($channel->name); ?>"> 
                            <div class="category hvr-shutter-out-horizontal" style="background-image: url(<?php echo e(asset('img/category/'.$channel->channel_img)); ?>)">
                                <div class="category__overlay"></div>
                                <div class="category__content">
                                    <div class="category__title"><?php echo e(ucfirst($channel->name)); ?></div>
                                    <div class="category__number"><?php echo e($channel->countthread($channel->id) > 1 ? $channel->countthread($channel->id) . ' TOPICS' : $channel->countthread($channel->id) . ' TOPIC'); ?> </div>
                                </div>
                            </div>
                        </a>
                    </div>   
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                
                
                
        </div>
        <div class="col-md-3">
            <h1 class="header header--orange">featured topics</h1>
            <?php $__currentLoopData = $topics; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $topic): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="sidebar">
                    <div class="sidebar__img">
                        <img src="<?php echo e($topic->thread_img ? asset('img/'.$topic->thread_img) : asset('img/forum_bg.jpeg')); ?>" class="featured-img">
                    </div>
                    <div class="sidebar__content">
                        <div class="sidebar__content--title">
                                <a href="/threads/<?php echo e($topic->channel->name); ?>/<?php echo e($topic->id); ?>" class="white"> <?php echo e(strlen($topic->title) < 10 ? $topic->title : substr($topic->title ,0,10).'.....'); ?></a>
                        </div>
                        <div class="sidebar__content--details">
                            <?php echo e($topic->counts() < 10 ? $topic->body : substr($topic->body ,0,20).'.....'); ?>

                        </div>
                        <div class="sidebar__content--footer">
                            <p><?php echo e($topic->channel->name); ?></p>
                        </div>
                    </div>
                </div>
                <div class="sidebar--border" style="display : <?php echo e($loop->last ? 'none' : 'last'); ?>"></div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
            
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>