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
        Schema::create('raitings', function (Blueprint $table) {
            $table->id();
            $table->timestamp('date_and_time');
            $table->foreignId('user');
            $table->foreignId('mechanic');
            $table->foreignId('service');
            $table->integer('rating');
            $table->text('note')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('raitings');
    }
};
