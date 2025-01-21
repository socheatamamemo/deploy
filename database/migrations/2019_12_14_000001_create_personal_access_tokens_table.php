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
        Schema::create('personal_access_tokens', function (Blueprint $table) {
            $table->id()->comment('Primary key for the personal_access_tokens table');
            $table->morphs('tokenable'); // No need to add the index name here
            $table->string('name', 255)->comment('Name of the token for identification');
            $table->string('token', 64)->unique()->comment('Unique token identifier');
            $table->text('abilities')->nullable()->comment('Permissions associated with the token');
            $table->timestamp('last_used_at')->nullable()->index()->comment('Timestamp when the token was last used');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personal_access_tokens');
    }
};
