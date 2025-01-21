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
        Schema::create('crime_type', function (Blueprint $table) {
            $table->id()->comment('Primary key for the crime_type table');
            $table->string('crime_type_name', 255)->unique()->comment('Name of the crime type');
            $table->string('image', 255)->comment('Image associated with the crime type');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('crime_type');
    }
};
