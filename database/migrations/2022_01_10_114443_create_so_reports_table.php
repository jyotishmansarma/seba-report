<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSoReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('so_reports', function (Blueprint $table) {
            $table->id();
            $table->integer('so_id');
            $table->integer('time_table_id');
            $table->string('centre_id');
            $table->string('ent_by')->nullable();
            $table->string('ent_ts')->nullable();
            $table->string('last_mod_by')->nullable();
            $table->string('mod_ts')->nullable();
            $table->string('ip');
            $table->double('distance_to_centre')->nullable();
            $table->string('path_to_centre')->nullable();
            $table->string('upload_ts')->nullable();
            $table->double('so_conveyance_allowance')->nullable();
            $table->double('so_dearness_allowance')->nullable();
            $table->string('so_findings_cctv')->nullable();
            $table->string('so_findings_boundary_wall')->nullable();
            $table->string('so_findings_room')->nullable();
            $table->string('so_findings_seatarrangement')->nullable();
            $table->string('so_findings_urinals')->nullable();
            $table->string('so_findings_comments')->nullable();
            $table->text('remarks')->nullable();
            $table->integer('total_male_morning')->nullable();
            $table->integer('total_female_morning')->nullable();
            $table->integer('total_present_male_morning')->nullable();
            $table->integer('total_present_female_morning')->nullable();
            $table->string('loc_lat')->nullable();
            $table->string('loc_lng')->nullable();
            $table->string('so_findings_venue')->nullable();
            $table->string('so_findings_invigilation')->nullable();
            $table->string('so_findings_qp')->nullable();
            $table->string('so_findings_as_safe')->nullable();
            $table->string('so_findings_unfairmeans')->nullable();
            $table->string('so_findings_continue')->nullable();
            $table->string('so_findings_visitingofficer')->nullable();

            $table->string('so_findings_expelled')->nullable();
            $table->integer('total_male_afternoon')->nullable();
            $table->integer('total_female_afternoon')->nullable();
            $table->integer('total_present_male_afternoon')->nullable();
            $table->integer('total_present_female_afternoon')->nullable();
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
        Schema::dropIfExists('so_reports');
    }
}
