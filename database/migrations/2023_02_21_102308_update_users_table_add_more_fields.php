<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('students', function (Blueprint $table) {
            $table->string('nationality')->default('Filipino');
            $table->date('birthday')->nullable();
            $table->string('civil_status')->default('single');
            $table->string('religion')->nullable();
            $table->string('gender')->nullable();
            $table->boolean('has_disability')->default(false);
            $table->string('height')->nullable();
            $table->string('weight')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('students', function (Blueprint $table) {
            $table->dropColumn([
                'nationality',
                'birthday',
                'civil_status',
                'religion',
                'gender',
                'has_disability',
                'height',
                'weight',
            ]);
        });
    }
};
