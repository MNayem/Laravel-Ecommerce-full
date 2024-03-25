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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();

            $table->string('website_name')->nuulable();
            $table->string('website_url')->nuulable();
            $table->string('title')->nuulable();
            $table->string('meta_keyword',500)->nullable();
            $table->string('meta_description',500)->nullable();

            $table->string('address')->nuulable();
            $table->string('phone1')->nuulable();
            $table->string('phone2')->nullable();
            $table->string('email1')->nuulable();
            $table->string('email2')->nullable();

            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('instagram')->nullable();
            $table->string('youtube')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
