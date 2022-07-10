<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

//this for admins
Route::group(['middleware' => 'check_admin'], function () {
    Route::get('teach/methods', 'teach_methods@get_teach_methods');
    Route::post('teach/methods/add','teach_methods@add');
    Route::get('teach/methods/delete/{id}','teach_methods@Delete');

    Route::get('days', function(){
        return view('admins.days');
    });
    Route::post('days/add','day@add');

    Route::get('degrees', 'degree@get_degrees');
    Route::post('degrees/add', 'degree@add');
    Route::get('degrees/delete/{id}', 'degree@Delete');

    Route::get('departments', 'department@get_departments');
    Route::post('departments/add', 'department@add');
    Route::get('departments/delete/{id}', 'department@Delete');


    Route::get('groups', 'group@get_groups');
    Route::post('groups/add', 'group@add');
    Route::get('groups/delete/{id}', 'group@Delete');

    Route::get('terms', 'term@get_terms');
    Route::post('terms/add', 'term@add');
    Route::get('terms/delete/{id}', 'term@Delete');

    Route::get('levels', 'level@get_levels');
    Route::post('levels/add', 'level@add');
    Route::get('levels/delete/{id}', 'level@Delete');

    Route::get('places', 'place@get_places');
    Route::post('places/add', 'place@add');
    Route::get('places/delete/{id}', 'place@Delete');


    Route::get('level/groups','level_group@get_level_groups');
    Route::post('level/groups/add', 'level_group@add');

    Route::get('timeslots','timeslot@get_timeslots');
    Route::post('timeslots/add', 'timeslot@add');
    Route::get('timeslots/delete/{id}', 'timeslot@Delete');

    Route::get('students','student@get_students');
    Route::post('students/add', 'student@add');
    Route::post('students/get_groups', 'student@get_groups');
    Route::get('students/delete/{id}', 'student@Delete');

    Route::get('doctors','doctor@get_doctors');
    Route::post('doctors/add', 'doctor@add');
    Route::get('doctors/delete/{id}', 'doctor@Delete');

    Route::get('place/days','place_day@get_place_days');
    Route::post('place/days/add', 'place_day@add');
    Route::get('place/days/delete/{id}', 'place_day@Delete');

    Route::get('day/timeslots','day_timeslot@get_day_timeslots');
    Route::post('day/timeslots/add', 'day_timeslot@add');
    Route::get('day/timeslots/delete/{id}', 'day_timeslot@Delete');

    Route::get('place/day/timeslots','place_day_timeslot@get_place_day_timeslots');
    Route::post('place/day/timeslots/add', 'place_day_timeslot@add');
    Route::get('place/day/timeslots/delete/{id}', 'place_day_timeslot@Delete');
    Route::post('place/day/timeslots/get_place_time_slots', 'place_day_timeslot@get_place_time_slots');

    Route::get('subjects','subject@get_subjects');
    Route::post('subjects/add', 'subject@add');
    Route::get('subjects/delete/{code}', 'subject@Delete');

    Route::get('department/subjects','depart_subject@get_depart_subjects');
    Route::post('department/subjects/add', 'depart_subject@add');

    Route::get('pre_requests','pre_request@get_subjects');
    Route::post('pre_requests/add', 'pre_request@add');
    
    Route::get('tables/', function(){
        return view('admins.tables');
    });
    Route::post('doctor/table','control@doctor_table');
    Route::post('depart/table','control@depart_table');
    Route::post('level/table','control@level_table');
    Route::post('all/table','control@all_table');
    Route::post('control/state','control@control_state');

    Route::get('requests', 'admin_request@get_admin_requests');
    Route::get('requests/update/{id}/{status}', 'admin_request@update_student_requests');
    
});

//this for students

Route::group(['middleware' => 'check_student'], function () {
    Route::get('student/subjects','homeController@index');
    Route::post('student/subjects/add', 'student_subject@add');
    Route::get('student/subjects/delete/{id}', 'student_subject@Delete');
    Route::get('student/academic/registry/view', 'student_subject@get_academic_registry_view');
    Route::get('student/academic/registry', 'student_subject@get_academic_registry');
    Route::get('student/requests', 'student_request@get_student_requests');
    Route::post('student/requests/add', 'student_request@add');
    Route::get('student/requests/delete/{id}', 'student_request@Delete');
});
 
//this for doctors 
Route::group(['middleware' => 'check_doctor'], function () {
    Route::get('doctor/days','doctor_day@get_doctor_days');
    Route::post('doctor/days/add', 'doctor_day@add');

    Route::get('student/marks','student_subject@get_student_mark_view');
    Route::post('student/marks/add', 'student_subject@set_marks');
    Route::post('student/subjects/check/exits', 'student_subject@check_student_exits');
    Route::post('student/subjects/get/subjects', 'student_subject@get_thestudent_subjects');

    Route::get('doctor/subjects','doctor_subject@get_doctor_subjects');
    Route::post('doctor/subjects/add', 'doctor_subject@add');
    Route::get('doctor/subjects/teach_methods', 'doctor_subject@get_doctor_subjects_teach_methods');
    Route::get('doctor/subjects/devision_types', 'doctor_subject@get_doctor_subjects_devision_types');
    Route::post('doctor/subjects/teach_methods/add', 'doctor_subject@set_doctor_subjects_teach_methods');
    Route::post('doctor/subjects/devision_types/add', 'doctor_subject@set_doctor_subjects_devision_types');

    Route::get('doctor/day/timeslots','doctor_day_timeslot@get_doctor_day_timeslots');
    Route::post('doctor/day/timeslots/add', 'doctor_day_timeslot@add');
    Route::post('doctor/day/timeslots/show', 'doctor_day_timeslot@select_avalable_doctor_time_slots_specificDays');
    Route::post('doctor/day/timeslots/get_timeslots_count', 'doctor_day_timeslot@get_timeslots_count');
    Route::post('doctor/day/timeslots/doctor_subjects_count', 'doctor_day_timeslot@doctor_subjects_count');
    

});
Route::group(['middleware'=>'auth'], function(){
    Route::get('logout',function(){
        auth()->logout();
        return redirect('login');
    });
});

