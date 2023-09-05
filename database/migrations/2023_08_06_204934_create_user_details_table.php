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
        Schema::create('user_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('avatar_path')->nullable();
            $table->string('firstname', 30)->nullable();
            $table->string('lastname', 30)->nullable();
            $table->string('about', 255)->nullable();
            $table->string('country', 30)->nullable();
            $table->string('city', 30)->nullable();
            $table->string('url_linkedin')->nullable();
            $table->string('url_youtube')->nullable();
            $table->string('url_facebook')->nullable();
            $table->string('url_instagram')->nullable();
            $table->string('url_github')->nullable();
            $table->string('url_twitter')->nullable();
            $table->bigInteger('profile_views');
            $table->bigInteger('generated_qr_codes');
            $table->bigInteger('time_spent');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_details');
    }
};
