<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePresentationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('presentations', function (Blueprint $table) {
            $table->id();
            $table->string('day');
            $table->string('lecture_Slot');
            $table->integer('group_Id');
            $table->integer('group_avail');
            $table->integer('Supervisor_avail');
            $table->integer('CoOrdinator_avail');
            $table->integer('done');
            $table->timestamps();
        });
 Schema::create('scheduled_presentations', function (Blueprint $table) {
            $table->id();
            $table->string('day');
            $table->string('time');
            $table->string('mon');
            $table->string('tues');
            $table->string('wed');
            $table->string('thurs');
            $table->string('fri');
            $table->string('sat');
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
        Schema::dropIfExists('presentation');
    }
}
