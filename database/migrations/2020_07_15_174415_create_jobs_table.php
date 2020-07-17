<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');

            $table->string('title')->nullable();
            $table->longText('description')->nullable();
            $table->string('type')->nullable();
            $table->string('company_name')->nullable();
            $table->string('city')->nullable();

            $table->unsignedBigInteger('salary')->nullable();
            $table->date('creation_date')->nullable();
            $table->date('expiry_date')->nullable();
            $table->timestamps();

            $table->index('user_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jobs');
    }
}
