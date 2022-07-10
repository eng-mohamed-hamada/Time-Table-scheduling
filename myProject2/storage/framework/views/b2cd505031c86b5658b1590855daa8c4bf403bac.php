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
                            <li><a href="<?php echo e(url('pre_requests')); ?>">Pre Requests</a></li>
                            <li><a href="<?php echo e(url('levels')); ?>">Levels</a></li>
                            <li class="active"><a href="<?php echo e(url('days')); ?>">Days</a></li>
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
                        <div class="active col-xs-12 text-left">Days</div>
                        <div class="main_direct" id="days">                                  
                                <form name="days" method="post" role="form" class="inputs" action="<?php echo e(url('days/add')); ?>">
                                        <div class="form-group">
                                            <br>
                                            <br>

                                            <label class="form-control btn-success"><?php echo e(session()->get('success')); ?></label>
                                        </div>
                                        <div class="form-group">
                                            <div class="checkbox form-check">
                                                <label>
                                                    <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 alert alert-success">
                                            <div class="checkbox form-check">
                                                <label>
                                                    <input id="checkAll" type="checkbox"> <span class="label-text">All</span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 alert alert-success">
                                            <div class="checkbox form-check">
                                                <label>
                                                    <input class="days" name="days[]" type="checkbox" value="السبت"> <span class="label-text">السبت</span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 alert alert-success">
                                            <div class="checkbox form-check">
                                                <label>
                                                    <input class="days" name="days[]" type="checkbox" value="الاحد"> <span class="label-text">الاحد</span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 alert alert-success">
                                            <div class="checkbox form-check">
                                                <label>
                                                    <input class="days" name="days[]" type="checkbox" value="الاثنين"> <span class="label-text">الاثنين</span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 alert alert-success">
                                            <div class="checkbox form-check">
                                                <label>
                                                    <input class="days" name="days[]" type="checkbox" value="الثلاثاء"> <span class="label-text">الثلاثاء</span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 alert alert-success">
                                            <div class="checkbox form-check">
                                                <label>
                                                    <input class="days" name="days[]" type="checkbox" value="الاربعاء"> <span class="label-text">الاربعاء</span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 alert alert-success">
                                            <div class="checkbox form-check">
                                                <label>
                                                    <input class="days" name="days[]" type="checkbox" value="الخميس"> <span class="label-text">الخميس</span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 alert alert-success">
                                            <div class="checkbox form-check">
                                                <label>
                                                    <input class="days" name="days[]" type="checkbox" value="الجمعه"> <span class="label-text">الجمعه</span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <input id="days_add" type="submit" value="add" onclick="thedays();" class="btn btn-primary">
                                        </div>
                                </form>
                                <div id="days_outputs" class="outputs">
                                </div>
                            </div>
                    </div>
                </div>
                <div class="footer col-xs-12 text-center">
                    this content is copy righted by the team
                </div>
            </div>
        </div> 
    <script src="js/ajax/days.js"></script>
   
    <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>