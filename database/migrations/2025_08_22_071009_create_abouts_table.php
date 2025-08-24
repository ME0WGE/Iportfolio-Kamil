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
            $table->string('first_name');
            $table->string('last_name');
            $table->string('subtitle');
            $table->string('birthdate');
            $table->string('website');
            $table->string('phone');
            $table->string('city');
            $table->unsignedSmallInteger('age');
            $table->string('degree');
            $table->string('email');
            $table->string('freelance');
            $table->string('subtext');
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
