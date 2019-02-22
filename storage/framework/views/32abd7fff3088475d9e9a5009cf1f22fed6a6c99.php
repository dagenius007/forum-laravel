<?php $__env->startSection('content'); ?>
    <div class="loginform">
            <div class="loginform__logo">
                    <img src="" alt="">
            </div>
            <div class="loginform__card animated fadeIn slower delay-4s">
                <form class="form" role="form" method="POST" action="<?php echo e(route('register')); ?>">
                    <?php echo e(csrf_field()); ?>

                    <div class="form__field<?php echo e($errors->has('name') ? ' has-error' : ''); ?>">
                        <div class="form__group">
                            <span><i class="fa fa-user-o form__icon" aria-hidden="true"></i></span>
                            <input placeholder="Name" type="text" class="form__input" name="name" value="<?php echo e(old('name')); ?>" required autofocus>
                                <?php if($errors->has('name')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('name')); ?></strong>
                                    </span>
                                <?php endif; ?>
                        </div>
                    </div>
                    <div class="form__field<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                        <div class="form__group">
                            <span><i class="fa fa-envelope-o form__icon" aria-hidden="true"></i></span>
                            <input placeholder="Email" type="email" class="form__input" name="email" value="<?php echo e(old('email')); ?>" required>

                                <?php if($errors->has('email')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('email')); ?></strong>
                                    </span>
                                <?php endif; ?>
                        </div>
                    </div>
                    <div class="form__field<?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
                        <div class="form__group">
                            <span><i class="fa fa-key form__icon" aria-hidden="true"></i></span>
                            <input id="password" type="password" class="form__input" name="password" required placeholder="Password">

                                <?php if($errors->has('password')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('password')); ?></strong>
                                    </span>
                                <?php endif; ?>
                        </div>
                    </div>
                    <div class="form__field">
                        <div class="form__group">
                                <span><i class="fa fa-key form__icon" aria-hidden="true"></i></span>
                            <input id="password-confirm" type="password" class="form__input" name="password_confirmation" placeholder="Confirm Password" required>
                        </div>
                    </div>

                    <div class="form__field">
                        <button type="submit" class="form__btn form__btn--lg form__btn--full-width">
                            Register
                        </button>
                    </div>
                    </form>
                    <div class="loginform__account"><span>Have an account already?</span><a href="/login"> Login</a> </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>