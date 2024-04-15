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
        Schema::create('promotions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger ('std_id');
            $table->foreign('std_id')->references('id')->on('students')->onDelete('cascade');
            $table->unsignedBigInteger ('from_grade');
            $table->foreign('from_grade')->references('id')->on('grades')->onDelete('cascade');
            $table->unsignedBigInteger ('from_class');
            $table->foreign('from_class')->references('id')->on('class_rooms')->onDelete('cascade');
            $table->unsignedBigInteger ('from_section');
            $table->foreign('from_section')->references('id')->on('sections')->onDelete('cascade');
            $table->unsignedBigInteger ('to_grade');
            $table->foreign('to_grade')->references('id')->on('grades')->onDelete('cascade');
            $table->unsignedBigInteger ('to_class');
            $table->foreign('to_class')->references('id')->on('class_rooms')->onDelete('cascade');
            $table->unsignedBigInteger ('to_section');
            $table->foreign('to_section')->references('id')->on('sections')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('promotions');
    }
};
