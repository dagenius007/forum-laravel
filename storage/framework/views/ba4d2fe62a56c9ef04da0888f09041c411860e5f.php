<?php $__env->startComponent('profiles.activities.activity'); ?>
	<?php $__env->slot('topic'); ?>
		<a href="/threads/<?php echo e($activity->subject->channel->name); ?>/<?php echo e($activity->subject->slug); ?>"><?php echo e($activity->subject->title); ?></a>
	<?php $__env->endSlot(); ?>

	<?php $__env->slot('category'); ?>
		<?php echo e($activity->subject->channel->name); ?>

	<?php $__env->endSlot(); ?>

	<?php $__env->slot('body'); ?>
		<?php echo e($activity->subject->created_at->format('D M Y')); ?>

	<?php $__env->endSlot(); ?>

	<?php $__env->slot('image'); ?>
		<?php echo e($activity->subject->thread_img); ?>

	<?php $__env->endSlot(); ?>

<?php echo $__env->renderComponent(); ?>