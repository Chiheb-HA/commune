<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('council_sessions', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->date('session_date');
            $table->enum('type', ['ordinaire', 'extraordinaire']);
            $table->string('committee_name')->nullable();
            $table->string('minutes_document')->nullable();
            $table->enum('status', ['upcoming', 'held', 'cancelled'])->default('upcoming');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('council_sessions');
    }
};