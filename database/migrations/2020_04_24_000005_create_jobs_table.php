<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobsTable extends Migration
{
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->longText('description');
            $table->string('budget');
            $table->date('due_date');
            $table->date('hired_at')->nullable();
            $table->string('language');
            $table->string('framework')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

    }
}
