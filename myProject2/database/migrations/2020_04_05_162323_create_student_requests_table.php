<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_requests', function (Blueprint $table) {
            $table->increments('id');
            $table->string('student_id')->index();
            $table->integer('required_hours');
            $table->string('resson');
            $table->string('status')->nullable();
            $table->integer('term_id')->unsigned()->index();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('student_requests');
    }
}
