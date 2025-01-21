<?php

// Migration file for contacts_frontend table
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('contacts_frontend', function (Blueprint $table) {
            $table->id()->comment('Primary key for the contacts_frontend table');
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('cascade')->index()->comment('References the users table');
            $table->string('full_name', 255)->comment('Full name of the contact');
            $table->string('email', 255)->comment('Email address of the contact');
            $table->text('message')->comment('Message submitted by the contact');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('contacts_frontend');
    }
};
