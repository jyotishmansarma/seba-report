<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSoPhotoUploadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('so_photo_uploads', function (Blueprint $table) {
            $table->id();
            $table->integer('so_id');
            $table->integer('center_id');
            $table->integer('time_table_id');
            $table->string('path_photo');
            $table->string('photo_type');
            $table->string('ip');
            $table->string('status')->comment('1:uploaded,0:not uploaded')->default('0');
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
        Schema::dropIfExists('so_photo_uploads');
    }
}
