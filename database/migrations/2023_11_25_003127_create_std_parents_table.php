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
        Schema::create('std_parents', function (Blueprint $table) {
            $table->id();
            $table->string('Email')->unique();
            $table->string('Password');

            //Fatherinformation
            $table->string('nameFather');
            $table->string('national_ID_Father');
            $table->string('passport_ID_Father');
            $table->string('phoneFather');
            $table->string('jobFather');
            $table->bigInteger('nationality_Father')->unsigned();
            $table->bigInteger('bloodFather')->unsigned();
            $table->bigInteger('religionFather')->unsigned();
            $table->string('addressFather');

            //Mother information
            $table->string('nameMother');
            $table->string('national_ID_Mother');
            $table->string('passport_ID_Mother');
            $table->string('phoneMother');
            $table->string('jobMother');
            $table->bigInteger('nationality_Mother')->unsigned();
            $table->bigInteger('bloodMother')->unsigned();
            $table->bigInteger('religionMother')->unsigned();
            $table->string('addressMother');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('std_parents');
    }
};
