<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExamRoutinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exam_routines', function (Blueprint $table) {
            $table->id();
            $table->integer('tt_id')->nullable();
            $table->date('date');
            $table->string('day');
            $table->string('subject');
            $table->string('time')->nullable();
            $table->string('shift');
            $table->string('start_time')->nullable();
            $table->string('end_time')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('exam_routines');
    }
}
