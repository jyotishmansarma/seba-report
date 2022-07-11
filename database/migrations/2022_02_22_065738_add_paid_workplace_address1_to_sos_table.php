<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPaidWorkplaceAddress1ToSosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sos', function (Blueprint $table) {
            //
            $table->string('workplace_address1')->nullable()->after('workplace_address');
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
            $table->dropColumn('workplace_address1');
        });
    }
}
