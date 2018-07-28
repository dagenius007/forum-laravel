<?php use App\Follower; ?>


<?php if(Session::has('edit')): ?>
    <script>toastr.success('<div><i class="em em-slightly_smiling_face"></i> We are happy to have you here. </div>')</script>
<?php endif; ?>

<?php $__env->startSection('content'); ?>
	<div class="profile">
		<div class="container">
				<div class="breadcrumbs">HOME / USER PROFILE</div>	
		</div>
		<div class="profile__cover" style="background-image: url(<?php echo e(asset('img/bg_1.jpg')); ?>)"></div>
		<div class='container'>
			<div class="row">
				<div class="col-md-12">
					<div class="profile__info">
						<img src="<?php echo e(asset('img/users/'. $profileUser->display_img)); ?>" alt="">
						<h3> 
							<?php echo e($profileUser->name); ?><div class="status" style=" background-color: <?php echo e(Auth::check() ?  '#1CFF0C' : 'red'); ?> "></div>
						</h3>

						<?php if(Auth::user()->name == $profileUser->name ): ?>
							<div> <a href="/threads/create">Created Thread</a> </div>
							<a href="<?php echo e(url('/profiles/'.Auth::user()->id.'/edit')); ?>"><i class="fa fa-cog" aria-hidden="true"></i></a>
						<?php endif; ?>

						<?php if(Auth::user()->name != $profileUser->name ): ?>
							<div>
								<following :isfollowing="<?php echo e(json_encode(Follower::yourFollowing($profileUser->id))); ?>" :user="<?php echo e(json_encode($profileUser->id)); ?>"></following>
							</div>
						<?php endif; ?>	
					</div>	

					<hr class="add_color">
					
					<div class="profile__details">
						<div>
							<p>FOLLOWERS</p>
							<h3 data-toggle="modal" data-target="#followers"><?php echo e(count($followers)); ?></h3>
						</div>
						<div>
							<p>FOLLOWING</p>	
							<h3 data-toggle="modal" data-target="#following"><?php echo e(count($followings)); ?></h3>
						</div>
						<div>
							<p>POST</p>
							<h3><?php echo e(count($profileUser->threads())); ?></h3>
						</div>
					</div>
					<!-- Followers -->
					<div class="modal fade" id="followers" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title">Followers</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">
									<?php $__empty_1 = true; $__currentLoopData = $followers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $follower): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
										<div class="row" style="border-bottom-width:<?php echo e($loop->last ? 0 : '1px'); ?>">
											<div class="col-md-7">
												<?php echo e($follower->name); ?>

											</div>
											<div class="col-md-5">
												<?php if($follower->id != Auth::user()->id): ?>
													<following :isfollowing="<?php echo e(json_encode(Follower::yourFollowing($follower->id))); ?>" :user="<?php echo e(json_encode($follower->id)); ?>"></following>
												<?php endif; ?>
											</div>
										</div>
											
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
										<p>No follower</p>
									<?php endif; ?>
								</div>
							</div>
						</div>
					</div>
					
					
					<div class="modal fade" id="following" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title">Following</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<div class="modal-body">
										<?php $__empty_1 = true; $__currentLoopData = $followings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $following): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
											<div class="row">
												<div class="col-md-7">
													<?php echo e($following->name); ?>

												</div>
												<div class="col-md-5">
													<?php if($following->id != Auth::user()->id): ?>
														<following :isfollowing="<?php echo e(json_encode(Follower::yourFollowing($following->id))); ?>" :user="<?php echo e(json_encode($following->id)); ?>"></following>
													<?php endif; ?>
												</div>
											</div>
										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
											<p>No follower</p>
										<?php endif; ?>
									</div>
								</div>
							</div>
					</div>
								
					<div class="profile__comments">
						<h4>Activites</h4>
							<div class="profile__activities">
								<?php if($activities != ''): ?>
									<?php $__empty_1 = true; $__currentLoopData = $activities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $date => $activity): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
										<?php $__currentLoopData = $activity; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $record): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
											<?php if(view()->exists("profiles.activities.{$record->type}")): ?>
												<?php echo $__env->make("profiles.activities.{$record->type}", ["activity" => $record], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
											<?php endif; ?>
										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
										<p>There is no activity for this user yet.</p>
									<?php endif; ?>
								<?php endif; ?>
										
							</div>
						</div>
					</div>
							
		
				
				</div>
						
			</div>
	</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>