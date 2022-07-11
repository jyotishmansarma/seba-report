<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCenterlistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('centerlists', function (Blueprint $table) {
            $table->id();
            $table->string('district_name');
            $table->integer('district_id');
            $table->integer('school_code');
            $table->string('school_name');
            $table->string('center_code');
            $table->integer('s_count')->nullable();
            $table->string('flag');
            $table->string('address');
            $table->string('phone_no');
            $table->integer('ent_by')->nullable();
            $table->timestamp('ent_ts')->nullable();
            $table->integer('mod_by')->nullable();
            $table->timestamp('mod_ts')->nullable();
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
        Schema::dropIfExists('centerlists');
    }
}
