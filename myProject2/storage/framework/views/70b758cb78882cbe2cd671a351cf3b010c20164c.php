<?php $__env->startSection('content'); ?>
        <div class="container-fluid">
            <div class="row">
                <div class="content col-xs-12">
                    <div class="sidebar col-xs-6 col-sm-3 col-md-2">
                        <div class="active col-xs-12">Dashboard</div>
                        <ul class="list-unstyled text-center">
                            <li><img class="img-responsive img-thumbnail img-circle" src="<?php echo e(asset('images/'.Auth::guard('webAdmin')->user()->photo)); ?>" alt="image"></li>
                            <li><?php echo e(Auth::guard('webAdmin')->user()->username); ?></li>
                            <li><a class="text-primary" href="admin_settings.php">Settings</a></li>
                        </ul>
                        <ul class="list-unstyled">
                            <li><a href="<?php echo e(url('terms')); ?>">Terms</a></li>
                            <li><a href="<?php echo e(url('doctors')); ?>">Doctors</a></li>
                            <li><a href="<?php echo e(url('subjects')); ?>">Subjects</a></li>
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
                            <li class="active"><a href="<?php echo e(url('level/groups')); ?>">Level Groups</a></li class="active">
                            <li><a href="<?php echo e(url('place/days')); ?>">Place Days</a></li>
                            <li><a href="<?php echo e(url('place/day/timeslots')); ?>">Place Time Slots</a></li>
                            <li><a href="<?php echo e(url('register/admin')); ?>">Create Admin</a></li>
                            <li><a href="<?php echo e(url('create/tables')); ?>">Create tables</a></li>
                            <li><a href="<?php echo e(url('tables')); ?>">Tables</a></li>
                            <li><a href="<?php echo e(url('requests')); ?>">Requests</a></li>
                        </ul>
                    </div>
                    <div class="main_content col-sm-9 col-md-10">
                        <div class="active col-xs-12 text-left">Level Groups</div>
                        <div class="main_direct" id="department_subjects">                               
                            <form name="department_subjects" method="post" action="<?php echo e(url('level/groups/add')); ?>" role="form" class="inputs">
                                <div class="form-group">
                                    <br>
                                    <br>

                                    <label class="form-control btn-success"><?php echo e(session()->get('success')); ?></label>
                                </div>
                                <div class="form-group">
                                    <?php echo e(csrf_field()); ?>

                                </div>
                                <div class="form-group">
                                    <label>Level*</label>
                                    <select name="level_id" class="form-control">
                                        <?php $__currentLoopData = $levels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $level): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($level->id); ?>"><?php echo e($level->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Group*</label>
                                        <?php $__currentLoopData = $groups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="checkbox form-check">
                                            <label>
                                                <input name="groups[]" type="checkbox" value="<?php echo e($group->id); ?>"> <span class="label-text"><?php echo e($group->name); ?></span>
                                            </label>
                                        </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                                <div class="form-group">
                                        <input type="submit" value="add" class="btn btn-primary">
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
        <!-- Start Scroll To Top-->
        <div id="scroll-top" class="fa fa-chevron-up"></div>
    <!-- End Scroll To Top-->
        <button title="Dashboard" class="thenav visible-xs-block fa fa-arrow-left">D</button> 
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>