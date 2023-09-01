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
        Schema::create('t_candidates', function (Blueprint $table) {
            $table->id();
            $table->integer('candidate_id');
            $table->string('email')->unique();
            $table->string('phone_number')->unique()->nullable();
            $table->string('full_name');
            $table->string('dob');
            $table->string('pob');
            $table->char('gender', 1)->default('M')->comment('M: Male, F: Female');
            $table->string('year_exp');
            $table->string('last_salary')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('t_candidates');
    }
};
