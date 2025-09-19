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
        Schema::create('all_jobs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('employer_id'); // Employer who posted
            $table->string('title');
            $table->string('company');
            $table->string('skill_set');
            $table->text('description');
            $table->string('location');
            $table->decimal('salary', 10, 2)->nullable();
            $table->integer('experience');
            $table->string('job_type');
            $table->integer('total_openings');
            $table->timestamps();

            $table->foreign('employer_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('all_jobs');
    }
};
