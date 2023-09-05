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
        Schema::create('qr_codes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('qr_code_type_id');
            $table->unsignedBigInteger('error_correction_id');
            $table->string('qr_code_name', 30);
            $table->string('qr_code_description', 255);
            $table->string('image_path');
            $table->tinyInteger('is_public');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('qr_code_type_id')->references('id')->on('qr_code_types')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('error_correction_id')->references('id')->on('error_corrections')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('qr_codes');
    }
};
