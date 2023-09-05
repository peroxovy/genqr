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
        Schema::create('qr_code_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('qr_code_id');
            $table->bigInteger('views');
            $table->bigInteger('downloads');
            $table->bigInteger('likes');
            $table->bigInteger('shares');
            $table->timestamps();

            $table->foreign('qr_code_id')->references('id')->on('qr_codes')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('qr_code_details');
    }
};
