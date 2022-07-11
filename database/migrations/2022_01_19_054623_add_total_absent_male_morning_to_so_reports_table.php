<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTotalAbsentMaleMorningToSoReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('so_reports', function (Blueprint $table) {
            $table->integer('total_absent_male_morning')->nullable()->after('total_present_male_morning');
            $table->integer('total_absent_female_morning')->nullable()->after('total_present_female_morning');
            $table->integer('total_absent_male_afternoon')->nullable()->after('total_present_male_afternoon');
            $table->integer('total_absent_female_afternoon')->nullable()->after('total_present_female_afternoon');
            $table->string('visiting_officer')->nullable()->after('so_findings_visitingofficer');
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
            $table->dropColumn('total_absent_male_morning');
            $table->dropColumn('total_absent_female_morning');
            $table->dropColumn('total_absent_male_afternoon');
            $table->dropColumn('total_absent_female_afternoon');
            $table->dropColumn('visiting_officer');
        });
    }
}
