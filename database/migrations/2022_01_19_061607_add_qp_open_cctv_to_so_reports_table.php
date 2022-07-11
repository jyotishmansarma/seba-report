<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddQpOpenCctvToSoReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('so_reports', function (Blueprint $table) {
            $table->string('qp_open_cctv')->nullable()->after('so_findings_qp');
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
            $table->dropColumn('qp_open_cctv');
        });
    }
}
