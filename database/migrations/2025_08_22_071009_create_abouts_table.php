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
        Schema::create('abouts', function (Blueprint $table) {
            $table->id();
            $table->string('subtitle', 30);
            $table->string('birthdate', 30);
            $table->string('website', 30);
            $table->string('phone', 30);
            $table->string('city', 30);
            $table->unsignedSmallInteger('age');
            $table->string('degree', 30);
            $table->string('email', 30);
            $table->string('freelance', 30);
            $table->string('src', 30);
            $table->string('subtext', 30);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('abouts');
    }
};
