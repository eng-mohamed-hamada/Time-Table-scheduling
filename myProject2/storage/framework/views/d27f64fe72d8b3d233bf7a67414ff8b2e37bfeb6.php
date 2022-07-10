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
                            <li><a href="<?php echo e(url('student/academic/registry/view')); ?>">Academic Registry</a></li>
                            <li class="active"><a href="<?php echo e(url('student/requests')); ?>">My Requests</a></li>
                        </ul>
                    </div>
                    <div class="main_content col-sm-9 col-md-10">
                        <div class="active col-xs-12 text-left">Student Requests</div>
                        <div class="main_direct" id="student_subjects">                                  
                                <form name="student_subjects" method="post" action="<?php echo e(url('student/requests/add')); ?>" role="form" class="inputs">
                                <div class="form-group">
                                            <br>
                                            <br>

                                            <label class="form-control btn-success"><?php echo e(session()->get('success')); ?></label>
                                        </div>
                                        <div class="form-group">
                                                <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>hours you want</label>
                                            <input name="required_hours" class="form-control" type="number">
                                        </div>
                                        <div class="form-group">
                                            <label>reson</label>
                                            <textarea name="resson" rows="10" class="form-control"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <button class="btn btn-primary"><i class="fa fa-send"></i> Send</button>
                                        </div>
                                </form>
                                <div class="outputs">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-hover text-center text-center">
                                            <tr>
                                                <td>id</td>
                                                <td>Required Hours</td>
                                                <td>Resson</td>
                                                <td>Status</td>
                                                <td>Delete</td>
                                            </tr>
                                            <?php $__currentLoopData = $requests; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $request): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e($request->id); ?></td>
                                                <td><?php echo e($request->required_hours); ?></td>
                                                <td><?php echo e($request->resson); ?></td>
                                                <td><?php echo e($request->status); ?></td>
                                                <td><a class="btn btn-danger" href="<?php echo e(url('student/requests/delete/'.$request->id)); ?>">Delete</a></td>
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