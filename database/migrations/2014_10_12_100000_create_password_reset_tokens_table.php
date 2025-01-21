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
        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email', 191)->primary()->comment('User email address');
            $table->string('token')->comment('Password reset token');
            $table->timestamp('created_at')->nullable()->comment('Time when the token was created');
            $table->timestamp('expires_at')->nullable()->comment('Time when the token expires');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('password_reset_tokens');
    }
};
