<?php use App\Follower; ?>


<?php $__env->startSection('content'); ?>
<thread-view :initial-replies-count="<?php echo e($thread->replies_count); ?>" inline-template>
<div class="container">
    <div class="row">
        <div class="col-md-12 topic">
            <div class="breadcrumbs">HOME / <?php echo e($thread->channel->name); ?> / Topic </div>
            <div class="topic__img" style="background-image: url(<?php echo e($thread->thread_img ? asset('img/'.$thread->thread_img) : asset('img/forum_bg.jpeg')); ?>)"></div>
            <div class="row">
                <div class="col-md-2">
                    <div class="topic__profile-pic">
                        <img src="<?php echo e(asset('img/users/'.$thread->creator->display_img )); ?>" alt="<?php echo e($thread->creator->name); ?>">
                    </div>
                    <?php if( $thread->creator): ?>
                        <div class="topic__user-info">
                            <a href="/profiles/<?php echo e($thread->creator->id); ?>"><?php echo e($thread->creator->name); ?></a>
                            <?php if(Auth::user()->name != $thread->creator->name ): ?>
                                <following :isfollowing="<?php echo e(json_encode(Follower::yourFollowing($thread->creator->id))); ?>" :user="<?php echo e(json_encode($thread->creator->id)); ?>"></following>
                            <?php endif; ?>  
                        </div>
                    <?php endif; ?>
                </div>
                <div class="col-md-10">
                    <div class="topic__content">
                        <div class="topic__header">
                            <h4><?php echo e($thread->title); ?></h4>
                            <div class="option">
                                <div class="option__date"><?php echo e($thread->created_at); ?></div>
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update', $thread)): ?>
                                    <div class="option__edit">
                                        <form action="<?php echo e($thread->path()); ?>" method='POST'>
                                            <?php echo e(csrf_field()); ?>

                                            <?php echo e(method_field('DELETE')); ?>

                                            <button type='submit' class='btn btn--primary'>Delete Thread</button>
                                        </form>
                                    </div>
                                    <div class="option__delete">
                                        <a href="/threads/edit/<?php echo e($thread->id); ?>" class='btn btn--primary'>Edit Thread</a>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="topic__body"><?php echo e($thread->body); ?></div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="topic__replies">
                    <replies @added='repliesCount++' @removed='repliesCount--'></replies>
                </div>
            </div>
        </div>
    </div>
</div>
</thread-view>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>