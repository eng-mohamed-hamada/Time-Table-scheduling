<?php $__env->startSection('content'); ?>
        <div class="container-fluid">
            <div class="row">
                <div class="content col-xs-12">
                    <div class="sidebar col-xs-6 col-sm-3 col-md-2">
                        <div class="active col-xs-12">Dashboard</div>
                        <ul class="list-unstyled text-center">
                            <li><img class="img-responsive img-thumbnail img-circle" src="<?php echo e(asset('images/'.Auth::guard('webAdmin')->user()->photo)); ?>" alt="image"></li>
                            <li><?php echo e(Auth::guard('webAdmin')->user()->username); ?></li>
                            <li><a  class="btn btn-primary" href="admin_settings.php">Settings</a></li>
                        </ul>
                        <ul class="list-unstyled">
                            <li><a href="<?php echo e(url('terms')); ?>">Terms</a></li>
                            <li><a href="<?php echo e(url('doctors')); ?>">Doctors</a></li>
                            <li class="active"><a href="<?php echo e(url('subjects')); ?>">Subjects</a></li>
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
                            <li><a href="<?php echo e(url('requests')); ?>">Requests</a></li>
                        </ul>
                    </div>
                    <div class="main_content col-sm-9 col-md-10">
                        <div class="active col-xs-12 text-left">Subjects</div>
                        <div class="main_direct" id="subjects">          
                                <form name="subjects" method="post" action="<?php echo e(url('subjects/add')); ?>" role="form" class="inputs">
                                    <div class="form-group">
                                        <br>
                                        <br>

                                        <label class="form-control btn-success"><?php echo e(session()->get('success')); ?></label>
                                    </div>
                                    <div class="form-group">
                                            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" class="form-control">
                                    </div>        
                                    <div class="form-group">
                                            <label>code *</label>
                                            <input name="code" type="text" class="form-control">
                                    </div>
                                    <div class="form-group">
                                            <label>name *</label>
                                            <input name="name" type="text" class="form-control">
                                    </div>
                                    <div class="form-group">
                                            <label>level id *</label>
                                            <select name="level_id" class="form-control">
                                                <?php $__currentLoopData = $levels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $level): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($level->id); ?>"><?php echo e($level->name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                    </div>
                                    <div class="form-group">
                                        <label>houres *</label>
                                        <input name="hours" min="1" type="number" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>lecture hours *</label>
                                        <input name="lecture_hours" min="1" type="number" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>section hours *</label>
                                        <input name="section_hours" min="1" type="number" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Full Mark *</label>
                                        <input name="full_mark" min="1" type="number" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Success Mark *</label>
                                        <input name="success_mark" min="1" type="number" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-primary"><i class="fa fa-send"></i> Add</button>
                                    </div>
                                </form>
                                <div id="subjects_outputs" class="outputs">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover text-center text-center">
                                        <tr>
                                            <td>Code</td>
                                            <td>Name</td>
                                            <td>Level ID</td>
                                            <td>Hours</td>
                                            <td>Total Hours</td>
                                            <td>Groups Hours</td>
                                            <td>Delete</td>
                                            <td>Edite</td>
                                        </tr>
                                        <?php $__currentLoopData = $subjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subject): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($subject->code); ?></td>
                                            <td><?php echo e($subject->name); ?></td>
                                            <td><?php echo e($subject->level_id); ?></td>
                                            <td><?php echo e($subject->hours); ?></td>
                                            <td><?php echo e($subject->total_hours); ?></td>
                                            <td><?php echo e($subject->groups_hours); ?></td>
                                            <td><a class="btn btn-danger" href="<?php echo e(url('subjects/delete/'.$subject->code)); ?>">Delete</a></td>
                                            <td>Edit</td>
                                        </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </table>
                                </div>
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