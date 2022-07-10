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
                            <li><a href="<?php echo e(url('doctor/days')); ?>">Doctor Days</a></li>
                            <li class="active"><a href="<?php echo e(url('doctor/day/timeslots')); ?>">Doctor Time Slots</a></li>
                            <li><a href="<?php echo e(url('table/view')); ?>">Table View</a></li>
                            <li><a href="<?php echo e(url('doctor/chat')); ?>">Chat</a></li>
                            <li><a href="<?php echo e(url('student/marks')); ?>">Student Marks</a></li>
                        </ul>
                    </div>
                    <div class="main_content col-sm-9 col-md-10">
                        <div class="active col-xs-12 text-left">Doctor Time Slots</div>
                        <div class="main_direct" id="doctor_time_slots">
                            
                        </div>
                        <div class="main_direct" id="doctor_subjects">
                            <form name="doctor_time_slots" role="form" class="inputs">
                                <div class="form-group">
                                    <?php echo e(csrf_field()); ?>

                                </div>
                                <div class="form-group">
                                    <label>subject *</label>
                                    <select name="doctor_subjects" id="doctor_time_slots_doctor_subjects" class="form-control">
                                        <option disabled selected>Choose the subject</option>
                                        <?php $__currentLoopData = $thesubjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subject): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($subject->id.'&'.$subject->code); ?>"><?php echo e($subject->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>count of Times *</label>
                                    <input id="time_slots_number" name="time_slots_number" type="hidden" value="1" class="form-control">
                                </div>
                                <div class="form-group">
                                    <input type="button" id="doctor_time_slots_add" value="add" class="btn btn-primary">
                                    <input type="button" id="doctor_time_slots_show" value="Show Avialable Time Slots" class="btn btn-primary">
                                </div>
                                <div id="doctor_time_slots_time_slots" class="outputs">
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
        <!-- Start Scroll To Top-->
        <div id="scroll-top" class="fa fa-chevron-up"></div>
    <!-- End Scroll To Top-->
        <button title="Dashboard" class="thenav visible-xs-block fa fa-arrow-left">D</button> 
        
    
    <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>