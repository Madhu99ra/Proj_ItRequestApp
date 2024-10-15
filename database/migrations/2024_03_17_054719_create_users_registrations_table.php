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
        Schema::create('users_registrations', function (Blueprint $table) {
            $table->id();
            $table->String('username')->unique();
            $table->String('email')->unique();
            $table->String('password');
            $table->String('name')->default('N/A');
            $table->String('department')->default('N/A');
            $table->String('post')->default('N/A');
            
            $table->string('role')->default('user');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users_registrations');
    }
};
