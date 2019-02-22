 
<?php $__env->startSection('content'); ?>


<div class="content-wrapper">

  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Users</h3>

          <?php $activities = Activity::users()->get(); ?>
          <div class="box-tools">
            <div class="input-group input-group-sm" style="width: 150px;">
              

              <div class="input-group-btn">
                
              </div>
            </div>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body table-responsive no-padding">
          <table class="table table-hover">
            <tr>
              <th>ID</th>
              <th>User</th>
              <th>Profile Picture</th>
              <th>Joined</th>
              <th>Status</th>
              <th>Actions</th>
            </tr>
            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
              <td><?php echo e($loop->iteration); ?></td>
              <td><?php echo e($user->name); ?></td>
              <td><img src="<?php echo e($user->display_img ? asset('img/users/'.$user->display_img) : asset('img/users/avatar.png')); ?>"
                  width="100" alt="" style="border-radius:1em;"></td>
              <td><?php echo e($user->created_at); ?></td>
              <td><span class="<?php echo e($activities->contains($user->name) ? 'btn btn-success' : 'btn btn-danger'); ?>"><?php echo e($activities->contains($user->name) ? 'Online' : 'Offline'); ?></span></td>
              <td>
                <?php if($user->blocked == 0): ?>
                  <a class="btn btn-danger" href="/admin/users/block/<?php echo e($user->id); ?>">Block</a> 
                <?php elseif( $user->blocked == 1 ): ?>
                  <a class="btn btn-danger" href="/admin/users/unblock/<?php echo e($user->id); ?>">Unblock</a> 
                <?php endif; ?>
              </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </table>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
  </div>

</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>