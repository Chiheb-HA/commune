<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('facility_reservations', function (Blueprint $table) {
            $table->id();
            $table->enum('facility_type', ['salle_des_fetes', 'souk']);
            $table->string('citizen_name');
            $table->string('citizen_phone');
            $table->string('citizen_email')->nullable();
            $table->date('requested_date');
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');
            $table->text('notes')->nullable();
            $table->boolean('is_active')->default(true);
            $table->integer('order')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('facility_reservations');
    }
};
