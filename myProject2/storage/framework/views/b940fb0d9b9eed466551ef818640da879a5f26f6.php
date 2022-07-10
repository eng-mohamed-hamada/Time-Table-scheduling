<?php $__env->startSection('content'); ?>
        <div class="container-fluid">
            <div class="row">
                <div class="content col-xs-12">
                    <div class="sidebar col-xs-6 col-sm-3 col-md-2">
                        <div class="active col-xs-12">Dashboard</div>
                        <ul class="list-unstyled text-center">
                            <li><img class="img-responsive img-thumbnail img-circle" src="<?php echo e(asset('images/'.Auth::guard('webDoctor')->user()->photo)); ?>" alt="image"></li>
                            <li><?php echo e(Auth::guard('webDoctor')->user()->username); ?></li>
                            <li><a class="text-primary" href="student_settings.php">Settings</a></li>
                        </ul>
                        <ul class="list-unstyled">
                            <li><a href="<?php echo e(url('doctor/subjects')); ?>">Doctor Subjects</a></li>
                            <li><a href="<?php echo e(url('doctor/days')); ?>">Doctor Days</a></li>
                            <li><a href="<?php echo e(url('doctor/day/timeslots')); ?>">Doctor Time Slots</a></li>
                            <li><a href="<?php echo e(url('table/view')); ?>">Table View</a></li>
                            <li><a href="<?php echo e(url('doctor/chat')); ?>">Chat</a></li>
                            <li class="active"><a href="<?php echo e(url('student/marks')); ?>">Student Marks</a></li>
                        </ul>
                    </div>
                    <div class="main_content col-sm-9 col-md-10">
                        <div class="active col-xs-12 text-left">Student Marks</div>
                        <div class="main_direct" id="student_subjects">                                  
                                <form name="student_subjects" method="post" action="<?php echo e(url('student/marks/add')); ?>" role="form" class="inputs">
                                    <div class="form-group">
                                        <br>
                                        <br>

                                        <label class="form-control btn-success"><?php echo e(session()->get('success')); ?></label>
                                    </div>
                                    <div class="form-group">
                                        <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" class="form-control">
                                    </div>    
                                    <div class="form-group">
                                        <input type="text" name="student_id" class="form-control" placeholder="Enter Student ID">
                                    </div>
                                    <div class="form-group" name="subjects">
                                        <label>Subject</label>
                                        <select id="student_subjects_result" name="student_subject" class="form-control">
                                            
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Mark</label>
                                        <input type="number" name="mark" class="form-control" min="0">
                                    </div>
                                    <div class="form-group">
                                        <input id="show_student_subjects" type="button" value="Show Subjects" class="btn btn-primary">
                                        <button id="student_marks_add" class="btn btn-primary"><i class="fa fa-send"></i> Add</button>
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