<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Departments
        Schema::create('departments', function (Blueprint $table) {
            $table->id();
            $table->string('name_fr');
            $table->string('name_en');
            $table->string('name_ar');
            $table->string('slug')->unique();
            $table->text('description_fr')->nullable();
            $table->text('description_en')->nullable();
            $table->text('description_ar')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('location')->nullable();
            $table->string('building_number')->nullable();
            $table->string('floor')->nullable();
            $table->text('responsibilities_fr')->nullable();
            $table->text('responsibilities_en')->nullable();
            $table->text('responsibilities_ar')->nullable();
            $table->string('head_id', 8)->nullable()->constrained('users')->onDelete('set null');
            $table->integer('order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
            $table->softDeletes();
        });

        // Officials Directory
        Schema::create('officials', function (Blueprint $table) {
            $table->id();
            $table->string('user_id', 8)->constrained()->onDelete('cascade');
            $table->foreignId('department_id')->constrained()->onDelete('cascade');
            $table->string('position_fr');
            $table->string('position_en');
            $table->string('position_ar');
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('office_location')->nullable();
            $table->string('office_number')->nullable();
            $table->text('bio_fr')->nullable();
            $table->text('bio_en')->nullable();
            $table->text('bio_ar')->nullable();
            $table->string('photo')->nullable();
            $table->text('specializations')->nullable();
            $table->text('qualifications')->nullable();
            $table->enum('status', ['active', 'inactive', 'on_leave', 'retired'])->default('active');
            $table->timestamp('start_date')->nullable();
            $table->timestamp('end_date')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        // Telephone Directory
        Schema::create('telephone_directory', function (Blueprint $table) {
            $table->id();
            $table->string('name_fr');
            $table->string('name_en');
            $table->string('name_ar');
            $table->string('phone');
            $table->string('extension')->nullable();
            $table->string('email')->nullable();
            $table->string('department')->nullable();
            $table->string('service')->nullable();
            $table->enum('type', ['office', 'emergency', 'general', 'support', 'hotline'])->default('office');
            $table->text('description')->nullable();
            $table->boolean('is_active')->default(true);
            $table->integer('order')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });

        // Opening Hours
        Schema::create('opening_hours', function (Blueprint $table) {
            $table->id();
            $table->foreignId('department_id')->nullable()->constrained()->onDelete('cascade');
            $table->string('day_of_week');
            $table->time('opening_time')->nullable();
            $table->time('closing_time')->nullable();
            $table->boolean('is_closed')->default(false);
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('opening_hours');
        Schema::dropIfExists('telephone_directory');
        Schema::dropIfExists('officials');
        Schema::dropIfExists('departments');
    }
};
