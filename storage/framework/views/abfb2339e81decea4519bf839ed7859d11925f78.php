
<div class="profile__activity">
    <div id="topic">
        <?php echo e($topic); ?>

    </div>
    <div>
        <?php echo e(ucfirst($category)); ?>

    </div>
    <div>
        <?php echo e($body); ?>

    </div>
    <div>
        <img src="<?php echo e(asset('img/'.$image)); ?>" alt="">
    </div>
</div>