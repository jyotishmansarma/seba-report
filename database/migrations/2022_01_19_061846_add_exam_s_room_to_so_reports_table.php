<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddExamSRoomToSoReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('so_reports', function (Blueprint $table) {
            $table->string('exam_s_room')->nullable()->after('visiting_officer');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('so_reports', function (Blueprint $table) {
            $table->dropColumn('exam_s_room');
        });
    }
}
