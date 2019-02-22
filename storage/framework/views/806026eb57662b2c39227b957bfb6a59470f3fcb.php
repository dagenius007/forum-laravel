<?php $__env->startSection('content'); ?>

            <div class="loginform">
                <div class="loginform__logo">
                    <img src="" alt="">
                </div>
                <div class="loginform__card animated fadeIn slower delay-4s">
                    
                        <form class="form" role="form" method="POST" action="<?php echo e(route('login')); ?>">
                            <?php echo e(csrf_field()); ?>


                            <div class="form__field<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                            
                                    <div class="form__group">
                                        <span><i class="fa fa-user-o form__icon" aria-hidden="true"></i></span>
                                        <input id="email" type="email" class="form__input" name="email" value="<?php echo e(old('email')); ?>" required placeholder="Email">
                                    </div>
                                   

                                    <?php if($errors->has('email')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('email')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                              
                            </div>

                            <div class="form__field<?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
                                
                                    <div class="form__group">
                                        <span> <i class="fa fa-key form__icon" aria-hidden="true"></i></span>
                                        <input id="password" type="password" class="form__input" name="password" placeholder="Password" required>
                                    </div>

                                    <?php if($errors->has('password')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('password')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                
                            </div>

                            

                            <div class="form__field">
                                    <button type="submit" class="form__btn form__btn--lg form__btn--full-width">
                                        Login
                                    </button>
                            </div>
                        </form>
                        <div class="loginform__account"><a href="/register">Create Account</a> </div>
                    </div>
                
                <div class="loginform__footer">
                    <div class="checkbox">
                       <label>
                             <input type="checkbox" name="remember" <?php echo e(old('remember') ? 'checked' : ''); ?>> Remember Me
                        </label>
                    </div>
                    <div>
                        <a class=" checkbox add_color" href="<?php echo e(route('password.request')); ?>">
                            Forgot Your Password?
                        </a>
                    </div>
                                
                </div>
            </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>