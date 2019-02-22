<?php $__env->startSection('content'); ?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Edit Admin
      </h1>
      <button class="btn btn-info" data-toggle="modal" data-target="#changePassword">Change Password</button>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Forms</a></li>
        <li class="active">General Elements</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">

        <div class="col-md-12">
  
          <div class="box box-primary">
          <form role="form" action="/admin/adminusers/update/<?php echo e($adminuser->id); ?>" method="post" enctype="multipart/form-data">
              <?php echo e(csrf_field()); ?>

              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Name</label>
                  <input type="text" class="form-control" value="<?php echo e($adminuser->name); ?>" name="name">

                    <?php if($errors->has('name')): ?>
                        <span class="help-block">
                            <strong><?php echo e($errors->first('name')); ?></strong>
                        </span>
                    <?php endif; ?>
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Email</label>
                  <input type="email" class="form-control" value="<?php echo e($adminuser->email); ?>" name="email">
                  
                    <?php if($errors->has('email')): ?>
                        <span class="help-block">
                            <strong><?php echo e($errors->first('email')); ?></strong>
                        </span>
                    <?php endif; ?>
                </div>

                <div class="form-group">
                  <label style="width: 100%;">Avatar</label>
                  <img src="<?php echo e($adminuser->avatar ? asset('img/users/'.$adminuser->avatar) : asset('img/users/avatar.png')); ?>" width="200" alt="" id="adminuser-img">
                  <input type="file" class="form-control" name="avatar" id="adminuser">
                  
                    <?php if($errors->has('channel')): ?>
                        <span class="help-block">
                            <strong><?php echo e($errors->first('channel')); ?></strong>
                        </span>
                    <?php endif; ?>
                </div>

                
                  
                    
                </div>
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Edit</button>
              </div>
            </form>
          </div>
          
  
      </div>
      <!-- /.row -->

      <div class="modal fade" id="changePassword" role="dialog">
        <div class="modal-dialog">
        
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Change Password
                    </h3>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form action="/admin/adminusers/updatepassword/<?php echo e($adminuser->id); ?>" method="post" id="myform">
                        <?php echo e(csrf_field()); ?>

                        <div class="form-group">
                            <input type="text" name="password" class="form-control" placeholder="Password" required>  
                        </div>
                        <div class="form-group">
                                <input type="text" name="password_confirmation" class="form-control" placeholder="Confirm Password" required>  
                            </div>
                        <div class="submit">
                            <button type="submit" class="btn btn--gradient btn--primary" id="subscribe">CHANGE</button>
                        </div>
                    </form>
                </div>
                
            </div>
        
        </div>
    </div>

    </section>
    <!-- /.content -->
  </div>

  

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>