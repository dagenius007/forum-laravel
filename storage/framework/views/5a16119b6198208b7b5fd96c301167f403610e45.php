<?php $__env->startSection('content'); ?>

<?php if(Session::has('message')): ?>
    <script>toastr.success('<div><i class="em em-slightly_smiling_face"></i> We are happy to have you here. </div>')</script>
    <script>toastr.success('<div>Feel free to create threads and edit your profile</div>')</script>
<?php endif; ?>

<div class="container home height">
    <div class="row">
        
        <div class="col-md-9">
                <div class="home-top">
                    <h1 class="header">LATEST TOPIC</h1>
                    <p><a href="/threads/create" data-toggle="tooltip" data-placement="left" title="Create Thread"><i class="fa fa-plus"></i></a></p>
                </div>
                
                <?php $__empty_1 = true; $__currentLoopData = $threads; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $thread): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card__profile" style="background-image: url(<?php echo e($thread->thread_img ? asset('img/'.$thread->thread_img) : asset('img/forum_bg.jpeg')); ?>)">
                                <img src="<?php echo e(asset('img/users/'.$thread->creator->display_img)); ?>" alt="">
                            </div>
                            <div class="card__content">
                                <h3 class="card__content--title"><a href="/threads/<?php echo e($thread->channel->name); ?>/<?php echo e($thread->id); ?>"><?php echo e(strlen($thread->title) < 20 ? $thread->title : substr($thread->title ,0,40).'.....'); ?></a></h3>
                                <p class="card__content--details"> <?php echo e($thread->counts() < 40 ? $thread->body : substr($thread->body ,0,40).'.....'); ?> </p>
                                <div class="card__content--footer">
                                    <div class="card__content--left">
                                        <p><?php echo e($thread->channel->name); ?></p>
                                    </div>
                                    <div class="card__content--right">
                                        <div class="badge">
                                            <?php echo e($thread->replies_count); ?>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <p>There are no threads in this category yet. <a href='/threads/create'>Create one!</a></p>
                <?php endif; ?> 
           
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