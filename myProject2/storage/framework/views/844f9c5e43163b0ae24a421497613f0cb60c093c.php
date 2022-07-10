<?php $__env->startSection('content'); ?>
        <div class="container-fluid">
            <div class="row">
                <div class="content col-xs-12">
                    <div class="sidebar col-xs-6 col-sm-3 col-md-2">
                        <div class="active col-xs-12">Dashboard</div>
                        <ul class="list-unstyled text-center">
                            <li><img class="img-responsive img-thumbnail img-circle" src="<?php echo e(asset('images/'.Auth::user()->photo)); ?>" alt="image"></li>
                            <li><?php echo e(Auth::user()->username); ?></li>
                            <li><a class="text-primary" href="student_settings.php">Settings</a></li>
                        </ul>
                        <ul class="list-unstyled">
                            <li><a href="<?php echo e(url('student/subjects')); ?>">Student Subjects</a></li>
                            <li class="active"><a href="<?php echo e(url('student/academic/registry/view')); ?>">Academic Registry</a></li>
                            <li><a href="<?php echo e(url('student/requests')); ?>">My Requests</a></li>
                        </ul>
                    </div>
                    <div class="main_content col-sm-9 col-md-10">
                        <div class="active col-xs-12 text-left">Academic Registery</div>
                        <div class="Academic_Registry main_direct" id="student_subjects">  
                            <div name="public_data" class="form-group">
                                <h3>جامعة بنى سويف</h3>
                                <h3>كلية الحاسبات والمعلومات</h3>
                                <h3>قسم: <?php echo e($depart_name); ?></h3>
                            </div>                                
                            <div id="student_academic_registry" class="form-group">
                                
                                
                            </div>
                            <div class="form-group">
                                <button id="show_academic_registry" class="btn btn-primary"><i class="fa fa-send"></i> Show academic registry</button>
                                <button id="print_academic_registry" class="btn btn-primary"><i class="fa fa-print"></i> Print</button>
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