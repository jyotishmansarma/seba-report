<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->integer('dist_id')->nullable();
            $table->string('name')->nullable();
            $table->string('user_name')->nullable();
            $table->string('password')->nullable();
            $table->string('email')->unique();
            $table->integer('phone_no')->nullable();
            $table->enum('role_add', ['Y', 'N'])->nullable();
            $table->enum('role_edit', ['Y', 'N'])->nullable();
            $table->enum('role_delete', ['Y', 'N'])->nullable();
            $table->enum('user_admin', ['Y', 'N']);
            $table->enum('working_status', ['Y', 'N']);
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
