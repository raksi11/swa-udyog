<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToPaymentsTable extends Migration
{
    public function up()
    {
        Schema::table('payments', function (Blueprint $table) {
            $table->unsignedInteger('from_id');
            $table->foreign('from_id', 'from_fk_1285497')->references('id')->on('users');
            $table->unsignedInteger('to_id');
            $table->foreign('to_id', 'to_fk_1285498')->references('id')->on('users');
            $table->unsignedInteger('job_id');
            $table->foreign('job_id', 'job_fk_1285501')->references('id')->on('jobs');
        });

    }
}
