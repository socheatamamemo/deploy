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
        Schema::create('failed_jobs', function (Blueprint $table) {
            $table->bigIncrements('id')->comment('Primary key for the failed_jobs table');
            $table->string('uuid', 36)->unique()->comment('Unique identifier for the failed job');
            $table->string('connection', 255)->index()->comment('Connection name where the job failed'); // Change to string with length
            $table->string('queue', 255)->index()->comment('Queue name where the job was being processed'); // Change to string with length
            $table->longText('payload')->comment('Serialized payload of the failed job');
            $table->longText('exception')->comment('Exception details');
            $table->timestamp('failed_at')->useCurrent()->comment('Timestamp when the job failed');
            // Remove softDeletes() since it's not commonly used for this table
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('failed_jobs');
    }
};
