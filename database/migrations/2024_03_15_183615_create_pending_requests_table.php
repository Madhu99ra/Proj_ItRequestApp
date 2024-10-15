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
        Schema::create('pending_requests', function (Blueprint $table) {
            $table->id();
            $table->String('username');
            $table->String('name');
            $table->date('reqdate');
            $table->String('issue')->nullable(false);
            $table->String('attended_by')->nullable();
            $table->date('resloved_date')->nullable();
            $table->String('distribution')->nullable();
            $table->String('remark')->nullable();

           
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pending_requests');
    }
};
