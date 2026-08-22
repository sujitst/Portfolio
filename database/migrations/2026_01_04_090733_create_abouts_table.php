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
            $table->unsignedBigInteger('info_id');

            $table->text('description');
            $table->string('age', 16);
            $table->string('number', 16);
            $table->string('nationality', 64);
            $table->string('gender', 32);
            $table->string('marital_status', 32);
            $table->date('dob', 64);

            $table->timestamps();
            $table->softDeletes();
            $table->foreign('info_id')->references('id')->on('my_information')->onDelete('cascade');
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
