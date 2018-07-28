<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="thread">
            <div class="thread__card">
                <form method="POST" action='/threads/store' enctype="multipart/form-data" class="form">
                        <?php echo e(csrf_field()); ?>

                    <div class='form__field'>
                        <div class="form__group form__select">
                            <select name='channel_id' class='form__select--thread form__input' required>
                                <option value=''>Choose one category</option>
                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($category->id); ?>" <?php echo e(old('channel_id') == $category->id ? 'selected' : ''); ?>>
                                        <?php echo e($category->name); ?>

                                    </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div> 
                    </div>
                    <div class="form__field">
                        <div class='form__group'>
                                <img src="" alt="" width="100%" height="200" id="thread-img">
                                <div class="create" >Choose an Image<input type="file" class="form__input form__input--img" name="thread_img" id="thread_img"></div>
                        </div>
                    </div>
                    <div class="form__field">
                        <div class='form__group'>
                            <input type='text' class='form__input' name='title' value="<?php echo e(old('title')); ?>" placeholder="Title" required>
                        </div>
                    </div>
                    <div class="form__field">
                        <div class='form__group'>
                            <textarea name='body' id='body' class='form__input' rows='8' required placeholder="Write your Post"><?php echo e(old('body')); ?></textarea>
                        </div>
                    </div>
                    <div class="form__field">
                        <div class='form-group'>
                                <button type='submit' class='form__btn form__btn--lg form__btn--full-width'>Create Thread</button>
                        </div>
                     </div>
                        <?php if(count($errors)): ?>
                            <ul class='alert alert-danger'>
                                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><?php echo e($error); ?></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        <?php endif; ?>
                </form>

            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>