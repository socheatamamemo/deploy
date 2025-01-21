<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pending_crimes', function (Blueprint $table) {
            $table->id()->comment('Primary key for the pending_crimes table');
            $table->timestamps();
            $table->string('description', 255)->comment('Description of the pending crime');
            $table->date('date')->comment('Date the crime was reported');
            $table->string('status', 50)->comment('Current status of the crime (e.g., pending, investigating)');
            $table->decimal('longitude', 10, 7)->comment('Longitude of the crime location');
            $table->decimal('latitude', 10, 7)->comment('Latitude of the crime location');
            $table->string('address', 255)->comment('Address where the crime occurred');
            $table->string('crime_type', 100)->comment('Type of crime (e.g., robbery, assault)');
            $table->foreignId('reportedby_user_id')->constrained('users')->onDelete('cascade')->comment('User who reported the crime');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pending_crimes');
    }
};
