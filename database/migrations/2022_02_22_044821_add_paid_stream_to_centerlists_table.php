<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPaidStreamToCenterlistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('centerlists', function (Blueprint $table) {
            //

            $table->string('stream')->nullable()->after('mod_ts');
            $table->string('permited')->nullable()->after('stream');
            $table->string('tag_code')->nullable()->after('permited');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('centerlists', function (Blueprint $table) {
            $table->dropColumn('stream');
            $table->dropColumn('permited');
            $table->dropColumn('tag_code');

        });
    }
}
