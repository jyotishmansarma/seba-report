<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSoCodeToSosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sos', function (Blueprint $table) {
            $table->integer('so_code')->nullable()->after('centre_id');
            $table->integer('district_serial_no')->nullable()->after('so_code');
            $table->string('designation')->after('name');
            $table->text('workplace_address')->after('phone_no');
            $table->text('home_address')->after('workplace_address');
            $table->integer('distance_to_centre')->after('home_address');
            $table->string('bank_name')->nullable()->after('distance_to_centre');
            $table->string('bank_branch')->nullable()->after('bank_name');
            $table->string('bank_ifsc')->nullable()->after('bank_branch');
            $table->integer('entered_by')->nullable()->after('working_status');
            $table->integer('modified_by')->nullable()->after('entered_by');
            $table->string('lot_flag')->nullable()->after('modified_by');
            $table->string('ip')->nullable()->after('lot_flag');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sos', function (Blueprint $table) {
            $table->dropColumn('so_code');
            $table->dropColumn('district_serial_no');
            $table->dropColumn('designation');
            $table->dropColumn('workplace_address');
            $table->dropColumn('home_address');
            $table->dropColumn('distance_to_centre');
            $table->dropColumn('bank_name');
            $table->dropColumn('bank_branch');
            $table->dropColumn('bank_ifsc');
            $table->dropColumn('entered_by');
            $table->dropColumn('modified_by');
            $table->dropColumn('lot_flag');
            $table->dropColumn('ip');
        });
    }
}
