<?php $__env->startSection('content'); ?>
        <div class="container-fluid">
            <div class="row">
                <div class="content col-xs-12">
                    <div class="sidebar col-xs-6 col-sm-3 col-md-2">
                        <div class="active col-xs-12">Dashboard</div>
                        <ul class="list-unstyled text-center">
                            <li><img class="img-responsive img-thumbnail img-circle" src="<?php echo e(asset('images/'.Auth::guard('webDoctor')->user()->photo)); ?>" alt="image"></li>
                            <li><?php echo e(Auth::guard('webDoctor')->user()->username); ?></li>
                            <li><a class="text-primary" href="doctor_settings.php">Settings</a></li>
                        </ul>
                        <ul class="list-unstyled">
                            <li><a href="<?php echo e(url('doctor/subjects')); ?>">Doctor Subjects</a></li>
                            <li class="active"><a href="<?php echo e(url('doctor/days')); ?>">Doctor Days</a></li>
                            <li><a href="<?php echo e(url('doctor/day/timeslots')); ?>">Doctor Time Slots</a></li>
                            <li><a href="<?php echo e(url('table/view')); ?>">Table View</a></li>
                            <li><a href="<?php echo e(url('doctor/chat')); ?>">Chat</a></li>
                            <li><a href="<?php echo e(url('student/marks')); ?>">Student Marks</a></li>
                        </ul>
                    </div>
                    <div class="main_content col-sm-9 col-md-10">
                        <div class="active col-xs-12 text-left">Doctor Days</div>
                        <div class="main_direct" id="doctor_days">                                   
                                <form name="doctor_days" method="post" action="<?php echo e(url('doctor/days/add')); ?>" role="form" class="inputs">
                                <div class="form-group">
                                        <br>
                                        <br>

                                        <label class="form-control btn-success"><?php echo e(session()->get('success')); ?></label>
                                    </div>
                                    <div class="form-group">
                                            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" class="form-control">
                                    </div>
                                    <div id="days" >
                                    <div class="form-group">
                                            <div class="checkbox form-check">
                                                <label>
                                                    <input id="checkAll" type="checkbox"> <span class="label-text">All</span>
                                                </label>
                                            </div>
                                        </div>
                                        <?php $__currentLoopData = $days; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $day): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="form-group">
                                            <div class="checkbox form-check">
                                                <label>
                                                    <input class="days" name="days[]" type="checkbox" value="<?php echo e($day->id); ?>"> <span class="label-text"><?php echo e($day->name); ?></span>
                                                </label>
                                            </div>
                                        </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
        <!-- Start Scroll To Top-->
        <div id="scroll-top" class="fa fa-chevron-up"></div>
    <!-- End Scroll To Top-->
        <button title="Dashboard" class="thenav visible-xs-block fa fa-arrow-left">D</button> 
        <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>