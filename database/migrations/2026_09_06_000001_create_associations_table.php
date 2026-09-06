<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('associations', function (Blueprint $table) {
            $table->id();
            $table->string('matricule')->unique();
            $table->string('authorization_number')->nullable();
            $table->date('authorization_date')->nullable();
            $table->string('name');
            $table->string('interest_area')->nullable();
            $table->text('correspondence_address')->nullable();
            $table->string('email')->nullable();
            $table->string('president_name')->nullable();
            $table->string('president_phone')->nullable();
            $table->string('president_fax')->nullable();
            $table->string('contact_person_name')->nullable();
            $table->string('contact_person_role')->nullable();
            $table->string('contact_person_phone')->nullable();
            $table->unsignedInteger('member_count')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('associations');
    }
};