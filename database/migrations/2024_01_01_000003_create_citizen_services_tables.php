<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Municipal Services
        Schema::create('municipal_services', function (Blueprint $table) {
            $table->id();
            $table->string('name_fr');
            $table->string('name_en');
            $table->string('name_ar');
            $table->string('slug')->unique();
            $table->text('description_fr')->nullable();
            $table->text('description_en')->nullable();
            $table->text('description_ar')->nullable();
            $table->string('icon')->nullable();
            $table->text('requirements_fr')->nullable();
            $table->text('requirements_en')->nullable();
            $table->text('requirements_ar')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->text('documents_required_fr')->nullable();
            $table->text('documents_required_en')->nullable();
            $table->text('documents_required_ar')->nullable();
            $table->string('processing_time')->nullable();
            $table->string('cost')->nullable();
            $table->boolean('is_active')->default(true);
            $table->integer('order')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });

        // Citizen Requests
        Schema::create('citizen_requests', function (Blueprint $table) {
            $table->id();
            $table->string('user_id', 8)->constrained('users', 'cin')->onDelete('cascade');
            $table->foreignId('service_id')->constrained('municipal_services')->onDelete('cascade');
            $table->string('request_number')->unique();
            $table->enum('status', ['pending', 'in_progress', 'on_hold', 'completed', 'rejected', 'cancelled'])->default('pending');
            $table->enum('priority', ['low', 'medium', 'high', 'urgent'])->default('medium');
            $table->text('description_fr')->nullable();
            $table->text('description_en')->nullable();
            $table->text('description_ar')->nullable();
            $table->string('reference_number')->nullable();
            $table->timestamp('assigned_at')->nullable();
            $table->string('assigned_to', 8)->nullable()->constrained('users', 'cin')->onDelete('set null');
            $table->timestamp('completed_at')->nullable();
            $table->text('notes')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        // Request Documents
        Schema::create('request_documents', function (Blueprint $table) {
            $table->id();
            $table->foreignId('citizen_request_id')->constrained()->onDelete('cascade');
            $table->string('file_name');
            $table->string('file_path');
            $table->string('file_type');
            $table->bigInteger('file_size');
            $table->string('uploaded_by', 8)->nullable();
            $table->timestamps();
        });

        // Complaints
        Schema::create('complaints', function (Blueprint $table) {
            $table->id();
            $table->string('user_id', 8)->constrained('users', 'cin')->onDelete('cascade');
            $table->string('complaint_number')->unique();
            $table->enum('category', ['infrastructure', 'services', 'staff', 'cleanliness', 'security', 'other'])->default('other');
            $table->text('description_fr');
            $table->text('description_en');
            $table->text('description_ar');
            $table->string('location')->nullable();
            $table->enum('status', ['new', 'acknowledged', 'in_investigation', 'resolved', 'dismissed', 'closed'])->default('new');
            $table->enum('priority', ['low', 'medium', 'high', 'urgent'])->default('medium');
            $table->string('reference_number')->nullable();
            $table->timestamp('assigned_at')->nullable();
            $table->string('assigned_to', 8)->nullable()->constrained('users', 'cin')->onDelete('set null');
            $table->text('response')->nullable();
            $table->timestamp('resolved_at')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        // Messages
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->string('from_user_id', 8)->constrained('users', 'cin')->onDelete('cascade');
            $table->string('to_user_id', 8)->constrained('users', 'cin')->onDelete('cascade');
            $table->foreignId('citizen_request_id')->nullable()->constrained()->onDelete('cascade');
            $table->text('content');
            $table->enum('status', ['sent', 'delivered', 'read'])->default('sent');
            $table->timestamp('read_at')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        // Event Registrations
        Schema::create('event_registrations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('event_id')->constrained()->onDelete('cascade');
            $table->string('user_id', 8)->constrained('users', 'cin')->onDelete('cascade');
            $table->string('email');
            $table->string('phone')->nullable();
            $table->integer('number_of_participants')->default(1);
            $table->enum('status', ['registered', 'confirmed', 'cancelled', 'attended'])->default('registered');
            $table->text('notes')->nullable();
            $table->timestamp('confirmed_at')->nullable();
            $table->timestamps();
            $table->unique(['event_id', 'user_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('event_registrations');
        Schema::dropIfExists('messages');
        Schema::dropIfExists('complaints');
        Schema::dropIfExists('request_documents');
        Schema::dropIfExists('citizen_requests');
        Schema::dropIfExists('municipal_services');
    }
};
