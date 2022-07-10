   <?php $__env->startSection('content'); ?>
        <div class="container-fluid">
            <div class="row">
                <div class="content col-xs-12">
                <div class="sidebar col-xs-6 col-sm-3 col-md-2">
                        <div class="active col-xs-12">Dashboard</div>
                        <ul class="list-unstyled text-center">
                            <li><img class="img-responsive img-thumbnail img-circle" src="<?php echo e(asset('images/'.Auth::guard('webAdmin')->user()->photo)); ?>" alt="image"></li>
                            <li><?php echo e(Auth::guard('webAdmin')->user()->username); ?></li>
                            <li><a class="btn btn-primary" href="admin_settings.php">Settings</a></li>
                        </ul>
                        <ul class="list-unstyled">
                            <li><a href="<?php echo e(url('terms')); ?>">Terms</a></li>
                            <li><a href="<?php echo e(url('doctors')); ?>">Doctors</a></li>
                            <li><a href="<?php echo e(url('subjects')); ?>">Subjects</a></li>
                            <li><a href="<?php echo e(url('pre_requests')); ?>">Pre Requests</a></li>
                            <li><a href="<?php echo e(url('levels')); ?>">Levels</a></li>
                            <li><a href="<?php echo e(url('days')); ?>">Days</a></li>
                            <li><a href="<?php echo e(url('degrees')); ?>">Degrees</a></li>
                            <li><a href="<?php echo e(url('departments')); ?>">Departments</a></li>
                            <li><a href="<?php echo e(url('department/subjects')); ?>">Department Subjects</a></li>
                            <li><a href="<?php echo e(url('places')); ?>">Places</a></li>
                            <li><a href="<?php echo e(url('timeslots')); ?>">Time Slots</a></li>
                            <li><a href="<?php echo e(url('day/timeslots')); ?>">Day Time Slots</a></li>
                            <li><a href="<?php echo e(url('students')); ?>">Students</a></li>
                            <li><a href="<?php echo e(url('teach/methods')); ?>">Teach Method</a></li>
                            <li><a href="<?php echo e(url('groups')); ?>">Groups</a></li>
                            <li><a href="<?php echo e(url('level/groups')); ?>">Level Groups</a></li>
                            <li><a href="<?php echo e(url('place/days')); ?>">Place Days</a></li>
                            <li><a href="<?php echo e(url('place/day/timeslots')); ?>">Place Time Slots</a></li>
                            <li><a href="<?php echo e(url('register/admin')); ?>">Create Admin</a></li>
                            <li><a href="<?php echo e(url('create/tables')); ?>">Create tables</a></li>
                            <li><a href="<?php echo e(url('tables')); ?>">Tables</a></li>
                            <li class="active"><a href="<?php echo e(url('requests')); ?>">Requests</a></li>
                        </ul>
                    </div>
                    <div class="main_content col-sm-9 col-md-10">
                        <div class="active col-xs-12 text-left">The Requests</div>
                        <div class="main_direct" id="degrees">                                 
                            <form name="degrees" method="post" action="<?php echo e(url('degrees/add')); ?>" role="form" class="inputs">
                                <div class="form-group">
                                    <br>
                                    <br>

                                    <label class="form-control btn-success"><?php echo e(session()->get('success')); ?></label>
                                </div>
                                <div class="form-group">
                                        <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" class="form-control">
                                </div>
                                
                                <div class="form-group">
                                    <?php $__currentLoopData = $requests; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $the_request): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="alert alert-success">
                                            <img style="width:40px" class="img-responsive img-thumbnail img-circle" src="<?php echo e(asset('images/'.$the_request->photo)); ?>" alt="image">
                                            <strong>Mohamed Hamada Faheem (<?php echo e($the_request->student_id); ?>)</strong>
                                            <br>
                                            <span><?php echo e($the_request->created_at); ?></span>
                                            <br>
                                            <label>Required Hours:</label><span> <?php echo e($the_request->required_hours); ?></span>
                                            <p class="lead"><?php echo e($the_request->resson); ?></p>
                                            <div class="text-right">
                                                <a class="btn btn-primary" href="requests/update/<?php echo e($the_request->id); ?>/accepted"><i class="fa fa-check"></i> Accepted</a>
                                                <a class="btn btn-danger" href="requests/update/<?php echo e($the_request->id); ?>/rejected"><i class="fa fa-trash"></i> Rejected</a>
                                            </div>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    
                                </div>
                                
                            </form>
                                
                            </div>
                    </div>
                </div>
                <div class="footer col-xs-12 text-center">
                    this content is copy righted by the team
                </div>
            </div>
        </div> 
    <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>