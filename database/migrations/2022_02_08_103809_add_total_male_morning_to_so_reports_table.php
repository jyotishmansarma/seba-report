<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTotalMaleMorningToSoReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('so_reports', function (Blueprint $table) {
            $table->integer('total_male')->nullable()->after('remarks');
            $table->integer('total_female')->nullable()->after('total_male');
            $table->integer('total_male_present')->nullable()->after('total_female');
            $table->integer('total_female_present')->nullable()->after('total_male_present');
            $table->integer('total_male_absent')->nullable()->after('total_female_present');
            $table->integer('total_female_absent')->nullable()->after('total_male_absent');
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
            $table->dropColumn('total_male');
            $table->dropColumn('total_female');
            $table->dropColumn('total_male_present');
            $table->dropColumn('total_female_present');
            $table->dropColumn('total_male_absent');
            $table->dropColumn('total_female_absent');
        });
    }
}
