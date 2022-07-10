

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
        <li><a href="<?php echo e(url('days')); ?>">Days</a></li>
        <li><a href="<?php echo e(url('degrees')); ?>">Degrees</a></li>
        <li><a href="<?php echo e(url('departments')); ?>">Departments</a></li>
        <li><a href="<?php echo e(url('department/subjects')); ?>">Department Subjects</a></li>
        <li><a href="<?php echo e(url('places')); ?>">Places</a></li>
        <li><a href="<?php echo e(url('timeslots')); ?>">Time Slots</a></li>
        <li class="active"><a href="<?php echo e(url('day/timeslots')); ?>">Day Time Slots</a></li>
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
