<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row height">
        <div class="settings">
            <button data-toggle="modal" data-target="#changepassword" class="btn btn--primary">Change Password</button>
            <div class="settings__card">
                <form method="POST" action='/profiles/<?php echo e($user->id); ?>/update' enctype="multipart/form-data">
                    <div class="col-md-6">
                        <?php echo e(csrf_field()); ?>

                        <div class="form__field">
                            <div class='form__group'>
                                <img src="<?php echo e(asset('img/users/'.$user->display_img)); ?>" width="200" alt="" id="user-img">
                                <div>Change Image<input type="file" class="form__input form__input--img" name="display_img" id="display_img"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-pad">
                        <div class="form__field">
                            <div class='form__group'>
                                <input type='text' class='form__input' name='name' value="<?php echo e($user->name); ?>" placeholder="Name" required>
                            </div>
                        </div>
                        
                        <div class="form__field">
                            <div class='form__group'>
                                <input type='email' class='form__input' name='email' value="<?php echo e($user->email); ?>" placeholder="Email" required>
                            </div>
                        </div>
                        <div class="form__field">
                            <div class='form__group'>
                                <button type='submit' class="form__btn form__btn--lg form__btn--full-width">Edit</button>
                            </div>
                        </div>
                        
                        <?php if(count($errors)): ?>
                            <ul class='alert alert-danger'>
                                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><?php echo e($error); ?></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                            <?php endif; ?>
                        
                    </div>
                </form>
        </div> 
        </div>
    </div>

    <div class="modal fade" id="changepassword" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Change Password</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/profile/<?php echo e($user->id); ?>/password" method="post">
                        <?php echo e(csrf_field()); ?>

                        <div class="form__field<?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
                            <div class="form__group">
                                <input id="password" type="password" class="form__input" name="password" placeholder="Password" required>
                                    <?php if($errors->has('password')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('password')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                            </div>
                        </div>
                        <div class="form__field">
                            <div class="form__group">
                                <input id="password-confirm" type="password" class="form__input" name="password_confirmation" placeholder="Confrim Password" required>
                            </div>
                        </div>
                        <div class="form__field">
                            <button type="submit" class="form__btn form__btn--lg form__btn--full-width">
                                Change
                            </button>
                        </div>
                    </form>
                </div>
                        
            </div>
        </div>
    </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>