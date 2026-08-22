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
        Schema::create('my_information', function (Blueprint $table) {
            $table->id();

            $table->string('name', 64);
            $table->string('skills', 256);
            $table->string('title', 256);
            $table->text('description');
            $table->string('cv', 256);
            $table->string('picture');
            
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('my_information');
    }
};
