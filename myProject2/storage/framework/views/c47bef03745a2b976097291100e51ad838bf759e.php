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
                            <li class="active"><a href="<?php echo e(url('pre_requests')); ?>">Pre Requests</a></li>
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
                            <li><a href="<?php echo e(url('level/groups')); ?>">Level Groups</a></li class="active">
                            <li><a href="<?php echo e(url('place/days')); ?>">Place Days</a></li>
                            <li><a href="<?php echo e(url('place/day/timeslots')); ?>">Place Time Slots</a></li>
                            <li><a href="<?php echo e(url('register/admin')); ?>">Create Admin</a></li>
                            <li><a href="<?php echo e(url('create/tables')); ?>">Create tables</a></li>
                            <li><a href="<?php echo e(url('tables')); ?>">Tables</a></li>
                            <li><a href="<?php echo e(url('requests')); ?>">Requests</a></li>
                        </ul>
                    </div>
                    <div class="main_content col-sm-9 col-md-10">
                        <div class="active col-xs-12 text-left">Pre Requests</div>
                        <div class="main_direct" id="department_subjects">                               
                                <form name="department_subjects" method="post" action="<?php echo e(url('pre_requests/add')); ?>" role="form" class="inputs">
                                    <div class="form-group">
                                        <br>
                                        <br>

                                        <label class="form-control btn-success"><?php echo e(session()->get('success')); ?></label>
                                    </div>
                                    <div class="form-group">
                                        <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Subject Code *</label>
                                        <input name="subject_code" type="text" class="form-control">
                                    </div>
                                    <div name="subject_code">
                                        <label>Subjects *</label>
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered table-hover text-center text-center">
                                                <tr>
                                                    <td>Code</td>
                                                    <td>Subject Name</td>
                                                    <td>Hours</td>
                                                    <td>selection</td>
                                                </tr>
                                                <?php $__currentLoopData = $subjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subject): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <td><?php echo e($subject->code); ?></td>
                                                    <td><?php echo e($subject->name); ?></td>
                                                    <td><?php echo e($subject->hours); ?></td>
                                                    <td>
                                                    <div class="checkbox form-check">
                                                        <label>
                                                            <input class="time_slots" name="pre_request_code[]" type="checkbox" value="<?php echo e($subject->code); ?>"> <span class="label-text"></span>
                                                        </label>
                                                    </div>
                                                    </td>
                                                </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-primary"><i class="fa fa-send"></i> Add</button>
                                    </div>
                                </form>
                                <div class="outputs">
                                </div>
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