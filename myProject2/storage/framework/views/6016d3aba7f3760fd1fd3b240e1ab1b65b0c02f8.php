<?php $__env->startSection('content'); ?>
        <div class="container-fluid">
            <div class="row">
                <div class="content col-xs-12">
                    <div class="sidebar col-xs-6 col-sm-3 col-md-2">
                        <div class="active col-xs-12">Dashboard</div>
                        <ul class="list-unstyled text-center">
                            <li><img class="img-responsive img-thumbnail img-circle" src="<?php echo e(asset('images/'.Auth::guard('webAdmin')->user()->photo)); ?>" alt="image"></li>
                            <li><?php echo e(Auth::guard('webAdmin')->user()->username); ?></li>
                            <li><a  class="text-primary" href="admin_settings.php">Settings</a></li>
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
                            <li class="active"><a href="<?php echo e(url('tables')); ?>">Tables</a></li>
                            <li><a href="<?php echo e(url('requests')); ?>">Requests</a></li>
                        </ul>
                    </div>
                    <div class="main_content col-sm-9 col-md-10">
                        <div class="active col-xs-12 text-left">The Tables</div>
                        <div class="main_direct" id="tables">
                            <form name="controls" role="form" action="<?php echo e(url('controlls')); ?>" class="inputs">
                                <div class="form-group">
                                    <label>
                                        <?php echo e(session()->get('success')); ?>

                                    </label>
                                </div>
                                <div class="form-group">
                                    <?php echo e(csrf_field()); ?>

                                </div>
                                <div class="form-group">
                                    <label>control the registeration state</label>
                                    <select id="control_state" class="form-control">
                                        <option value="none" selected disabled>Choose The Stat</option>
                                        <option value="student">Student</option>
                                        <option value="doctor">Doctor</option>
                                        <option value="none">close</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input id="change_state" type="button" value="Change">
                                </div>
                                <div class="form-group">
                                    <label>for what you want the table *</label>
                                    <select id="table_data" class="form-control">
                                        <option value="doctor">for doctor</option>
                                        <option value="department">for department</option>
                                        <option value="level">for level</option>
                                        <option value="place">for place</option>
                                        <option value="all">for All</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <input id="print" type="button" value="Print" class="hetables_outputs btn btn-primary">
                                    <input id="show_table" type="button" value="Show Table" class="btn btn-primary">
                                </div>
                            </form>
                            <div id="thetables_outputs" class="outputs">
                                
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