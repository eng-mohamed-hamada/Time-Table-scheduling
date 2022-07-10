<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
class Modifications extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('doctor_subjects', function (Blueprint $table) {
            $table->foreign('subject_code')->references('code')->on('subjects')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
            $table->foreign('doctor_id')->references('id')->on('doctors')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
            $table->foreign('teach_method_id')->references('id')->on('teach_methods')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
            $table->foreign('devision_type_id')->references('id')->on('devision_types')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
        });
        Schema::table('subjects', function (Blueprint $table) {
            $table->foreign('level_id')->references('id')->on('levels')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
        });
        Schema::table('student_subjects', function (Blueprint $table) {
            $table->foreign('student_id')->references('id')->on('students')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
            $table->foreign('subject_code')->references('code')->on('subjects')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
            $table->foreign('student_term_id')->references('id')->on('student_terms')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
        });
        Schema::table('students', function (Blueprint $table) {
            $table->foreign('level_id')->references('id')->on('levels')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
            $table->foreign('depart_id')->references('id')->on('departments')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
            $table->foreign('level_group_id')->references('id')->on('level_groups')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
        });
        Schema::table('level_groups', function (Blueprint $table) {
            $table->foreign('level_id')->references('id')->on('levels')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
            $table->foreign('group_id')->references('id')->on('groups')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
        });
        Schema::table('depart_subjects', function (Blueprint $table) {
            $table->foreign('depart_id')->references('id')->on('departments')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
            $table->foreign('subject_code')->references('code')->on('subjects')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
        });
        Schema::table('doctors', function (Blueprint $table) {
            $table->foreign('depart_id')->references('id')->on('departments')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
            $table->foreign('degree_id')->references('id')->on('degrees')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
        });
        Schema::table('doctor_days', function (Blueprint $table) {
            $table->foreign('doctor_id')->references('id')->on('doctors')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
            $table->foreign('day_id')->references('id')->on('days')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
        });
        Schema::table('day_time_slots', function (Blueprint $table) {
             $table->foreign('day_id')->references('id')->on('days')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
            $table->foreign('time_slots_id')->references('id')->on('time_slots')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
        });
        Schema::table('doctor_day_time_slots', function (Blueprint $table) {
            $table->foreign('doctor_id')->references('id')->on('doctors')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
            $table->foreign('day_time_slots_id')->references('id')->on('day_time_slots')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
            $table->foreign('doctor_subject_id')->references('id')->on('doctor_subjects')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
            $table->foreign('place_id')->references('id')->on('places')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
            $table->foreign('level_group_id')->references('id')->on('level_groups')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
        });
        Schema::table('place_days', function (Blueprint $table) {
            $table->foreign('place_id')->references('id')->on('places')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
            $table->foreign('day_id')->references('id')->on('days')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
        });
        Schema::table('place_day_time_slots', function (Blueprint $table) {
            $table->foreign('place_id')->references('id')->on('places')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
            $table->foreign('day_time_slots_id')->references('id')->on('day_time_slots')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
        });
        
        
        Schema::table('pre_requests', function (Blueprint $table) {
                $table->foreign('subject_code')->references('code')->on('subjects')
                        ->onUpdate('cascade')
                        ->onDelete('cascade');
                $table->foreign('pre_request_code')->references('code')->on('subjects')
                        ->onUpdate('cascade')
                        ->onDelete('cascade');
        });
        Schema::table('student_terms', function (Blueprint $table) {
            $table->foreign('student_id')->references('id')->on('students')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
            $table->foreign('term_id')->references('id')->on('terms')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
    });
        Schema::table('student_requests', function (Blueprint $table) {
                $table->foreign('student_id')->references('id')->on('students')
                        ->onUpdate('cascade')
                ->onDelete('cascade');
                $table->foreign('term_id')->references('id')->on('terms')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
        });

        // the database views
        //the_doctor_subjects view
        DB::statement("
        CREATE VIEW the_doctor_subjects  AS  
        select doctors.id AS id,doctors.name AS doctor_name,subjects.name AS subject_name,subjects.hours AS subject_hours from 
        doctors, subjects, doctor_subjects where 
        doctors.id = doctor_subjects.doctor_id and subjects.code = doctor_subjects.subject_code ;
        ");

        //the_lectures view
        DB::statement("
        CREATE VIEW the_lectures  AS  
        select days.id AS day_id,days.name AS day_name,subjects.code AS subject_code,subjects.name AS subject_name,time_slots.id AS time_slots_id,time_slots.time_from AS time_from,time_slots.time_to AS time_to,doctors.id AS doctor_id,doctors.name AS doctor_name,places.id AS place_id,places.name AS place_name,teach_methods.id AS teach_method_id,teach_methods.name AS teach_method_name,levels.id AS level_id,levels.name AS level_name from 
        days, time_slots, subjects, doctors, places, doctor_subjects, teach_methods, day_time_slots, doctor_day_time_slots, levels where 
        days.id = day_time_slots.day_id and time_slots.id = day_time_slots.time_slots_id and subjects.code = doctor_subjects.subject_code and doctors.id = doctor_subjects.doctor_id and day_time_slots.id = doctor_day_time_slots.day_time_slots_id and doctor_subjects.id = doctor_day_time_slots.doctor_subject_id and teach_methods.id = doctor_subjects.teach_method_id and levels.id = subjects.level_id and places.id = doctor_day_time_slots.place_id and doctor_day_time_slots.level_group_id is null ;
        ");

        //the_lectures_with_depart view
        DB::statement("
        CREATE VIEW the_lectures_with_depart  AS  select days.id AS day_id,days.name AS day_name,subjects.code AS subject_code,subjects.name AS subject_name,time_slots.id AS time_slots_id,time_slots.time_from AS time_from,time_slots.time_to AS time_to,doctors.id AS doctor_id,doctors.name AS doctor_name,places.id AS place_id,places.name AS place_name,teach_methods.id AS teach_method_id,teach_methods.name AS teach_method_name,levels.id AS level_id,levels.name AS level_name,departments.id AS depart_id,departments.name AS depart_name from
        days, time_slots, subjects, doctors, places, doctor_subjects, teach_methods, day_time_slots, doctor_day_time_slots, levels, departments, depart_subjects where
        days.id = day_time_slots.day_id and time_slots.id = day_time_slots.time_slots_id and subjects.code = doctor_subjects.subject_code and doctors.id = doctor_subjects.doctor_id and day_time_slots.id = doctor_day_time_slots.day_time_slots_id and doctor_subjects.id = doctor_day_time_slots.doctor_subject_id and teach_methods.id = doctor_subjects.teach_method_id and levels.id = subjects.level_id and places.id = doctor_day_time_slots.place_id and departments.id = depart_subjects.depart_id and subjects.code = depart_subjects.subject_code and doctor_day_time_slots.level_group_id is null ;
        ");

        //the_sections view
        DB::statement("
        CREATE VIEW the_sections  AS  select days.id AS day_id,days.name AS day_name,subjects.code AS subject_code,subjects.name AS subject_name,time_slots.id AS time_slots_id,time_slots.time_from AS time_from,time_slots.time_to AS time_to,doctors.id AS doctor_id,doctors.name AS doctor_name,places.id AS place_id,places.name AS place_name,teach_methods.id AS teach_method_id,teach_methods.name AS teach_method_name,levels.id AS level_id,levels.name AS level_name,groups.id AS id,groups.name AS name from
        days, time_slots, subjects, doctors, places, doctor_subjects, teach_methods, day_time_slots, doctor_day_time_slots, levels, groups, level_groups where
        days.id = day_time_slots.day_id and time_slots.id = day_time_slots.time_slots_id and subjects.code = doctor_subjects.subject_code and doctors.id = doctor_subjects.doctor_id and day_time_slots.id = doctor_day_time_slots.day_time_slots_id and doctor_subjects.id = doctor_day_time_slots.doctor_subject_id and teach_methods.id = doctor_subjects.teach_method_id and levels.id = subjects.level_id and places.id = doctor_day_time_slots.place_id and groups.id = level_groups.group_id and levels.id = level_groups.level_id and level_groups.id = doctor_day_time_slots.level_group_id ;
        ");

        //the_sections_with_depart
        DB::statement("
        CREATE VIEW the_sections_with_depart  AS  select days.id AS day_id,days.name AS day_name,subjects.code AS subject_code,subjects.name AS subject_name,time_slots.id AS time_slots_id,time_slots.time_from AS time_from,time_slots.time_to AS time_to,doctors.id AS doctor_id,doctors.name AS doctor_name,places.id AS place_id,places.name AS place_name,teach_methods.id AS teach_method_id,teach_methods.name AS teach_method_name,levels.id AS level_id,levels.name AS level_name,groups.id AS id,groups.name AS name,departments.id AS depart_id,departments.name AS depart_name from
        days, time_slots, subjects, doctors, places, doctor_subjects, teach_methods, day_time_slots, doctor_day_time_slots, levels, groups, level_groups, departments, depart_subjects where
        days.id = day_time_slots.day_id and time_slots.id = day_time_slots.time_slots_id and subjects.code = doctor_subjects.subject_code and doctors.id = doctor_subjects.doctor_id and day_time_slots.id = doctor_day_time_slots.day_time_slots_id and doctor_subjects.id = doctor_day_time_slots.doctor_subject_id and teach_methods.id = doctor_subjects.teach_method_id and levels.id = subjects.level_id and places.id = doctor_day_time_slots.place_id and groups.id = level_groups.group_id and levels.id = level_groups.level_id and level_groups.id = doctor_day_time_slots.level_group_id and departments.id = depart_subjects.depart_id and subjects.code = depart_subjects.subject_code ;
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('drop view the_lectures');
        DB::statement('drop view the_lectures_with_depart');
        DB::statement('drop view the_sections');
        DB::statement('drop view the_sections_with_depart');
    }
}
