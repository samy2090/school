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
        Schema::create('std_accounts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->references('id')->on('students')->onDelete('cascade');
            $table->foreignId('fees_id')->references('id')->on('fees')->onDelete('cascade');
            $table->foreignId('fees_invoice_id')->references('id')->on('fees_invoices')->onDelete('cascade');
            $table->bigInteger('credit');
            $table->bigInteger('debit');
            $table->string('info');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('std_accounts');
    }
};
