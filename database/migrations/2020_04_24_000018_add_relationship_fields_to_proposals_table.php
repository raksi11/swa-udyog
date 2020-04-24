<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToProposalsTable extends Migration
{
    public function up()
    {
        Schema::table('proposals', function (Blueprint $table) {
            $table->unsignedInteger('job_id');
            $table->foreign('job_id', 'job_fk_1285449')->references('id')->on('jobs');
            $table->unsignedInteger('freelancer_id');
            $table->foreign('freelancer_id', 'freelancer_fk_1364430')->references('id')->on('users');
        });

    }
}
