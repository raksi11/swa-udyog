<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToJobsTable extends Migration
{
    public function up()
    {
        Schema::table('jobs', function (Blueprint $table) {
            $table->unsignedInteger('client_id');
            $table->foreign('client_id', 'client_fk_1285437')->references('id')->on('users');
            $table->unsignedInteger('freelancer_id')->nullable();
            $table->foreign('freelancer_id', 'freelancer_fk_1285438')->references('id')->on('users');
        });

    }
}
