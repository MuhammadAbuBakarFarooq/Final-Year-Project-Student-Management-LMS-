<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddVotesToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('students', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('student_name');
            $table->string('student_email');
            $table->string('student_id');
            $table->string('cgpa');
            $table->string('pass');
            $table->string('st');
            $table->string('in_a_group');
            $table->string('is_manager');
            $table->string('group_id');
            $table->timestamps();
        });
          Schema::create('student_groups', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('student1');
            $table->string('student2');
            $table->string('student3');
            $table->string('student4');
            $table->string('student5');
            $table->string('group_id');
            $table->timestamps();
        });
         Schema::create('supervisors', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('supervisor_name');
            $table->string('supervisor_email');
            $table->string('supervisor_id');
            // $table->string('pass');
            // $table->string('st');
            $table->timestamps();
        });
         Schema::create('faculty_members', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('faculty_member_name');
            $table->string('faculty_member_email');
            $table->string('faculty_member_id');
            $table->string('pass');
            $table->string('st');
            $table->string('is_supervisor');
            $table->timestamps();
        });
        Schema::create('supervisor_ideas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->text('desc',255);
            $table->string('supervisor_id');
            $table->timestamps();
        });

        Schema::create('all_quries', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('askquery',255);
            $table->string('student_id');
            $table->string('group_id');
            $table->string('supervisor_id');
            $table->string('q_from');
            $table->string('q_not');
            $table->string('reply_of');
            $table->timestamps();
        });

         Schema::create('Query_notifications', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('f_student_id');
            $table->string('t_student_id');
            $table->string('group_id');
            $table->string('supervisor_id');
            $table->string('q_from');
            $table->string('q_for');
            $table->string('notif');
            $table->string('is_reply')->default('0');
            $table->string('q_id')->default('0');
            $table->timestamps();
        });
        Schema::create('student_ideas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->text('desc',255);
            $table->string('supervisor_id');
            $table->string('student_id');
            $table->string('group_id');
            $table->string('action');
            $table->string('student_notif')->default('0');
            $table->string('from');
            $table->timestamps();
        });

         Schema::create('feedback', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('feedback',255);
            $table->string('g_id');
            $table->string('f_id');
        });
        Schema::create('student_supervisors', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('supervisor_id');
            $table->text('group_id');
            $table->string('project_id');
            $table->timestamps();
        });

        Schema::create('capston_calendars', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('title');
            $table->text('week');
            $table->date('start_date');
            $table->date('end_date');
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
        Schema::table('students', function (Blueprint $table) {
            //
        });
    }
}
