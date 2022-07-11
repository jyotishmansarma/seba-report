<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateSosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sos', function (Blueprint $table) {
            $table->string('first_password_status')->nullable()->comment('null=Predefined Password, 1=Changed Password')->change();
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
            $table->string('first_password_status')->after('password')->change();
        });
    }
}
