<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pre-school')->nullable();
            $table->unsignedBigInteger('elementary')->nullable();
            $table->unsignedBigInteger('highschool')->nullable();
            $table->unsignedBigInteger('senior-highschool')->nullable();
            $table->foreign('pre-school')->references('id')->on('school_years');
            $table->foreign('elementary')->references('id')->on('school_years');
            $table->foreign('highschool')->references('id')->on('school_years');
            $table->foreign('senior-highschool')->references('id')->on('school_years');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('settings');
    }
};
