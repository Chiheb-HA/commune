<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Categories
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name_fr');
            $table->string('name_en');
            $table->string('name_ar');
            $table->string('slug')->unique();
            $table->text('description_fr')->nullable();
            $table->text('description_en')->nullable();
            $table->text('description_ar')->nullable();
            $table->string('icon')->nullable();
            $table->integer('order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
            $table->softDeletes();
        });

        // Articles
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained()->onDelete('cascade');
            $table->string('created_by', 8)->constrained('users')->onDelete('cascade');
            $table->string('updated_by', 8)->nullable()->constrained('users')->onDelete('set null');
            $table->string('title_fr');
            $table->string('title_en');
            $table->string('title_ar');
            $table->string('slug')->unique();
            $table->text('content_fr');
            $table->text('content_en');
            $table->text('content_ar');
            $table->text('summary_fr')->nullable();
            $table->text('summary_en')->nullable();
            $table->text('summary_ar')->nullable();
            $table->string('featured_image')->nullable();
            $table->enum('status', ['draft', 'published', 'archived'])->default('draft');
            $table->timestamp('published_at')->nullable();
            $table->integer('views')->default(0);
            $table->string('seo_keywords')->nullable();
            $table->string('seo_meta_description')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        // News
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->string('title_fr');
            $table->string('title_en');
            $table->string('title_ar');
            $table->string('slug')->unique();
            $table->text('content_fr');
            $table->text('content_en');
            $table->text('content_ar');
            $table->string('featured_image')->nullable();
            $table->string('created_by', 8)->constrained('users')->onDelete('cascade');
            $table->enum('status', ['draft', 'published', 'archived'])->default('draft');
            $table->timestamp('published_at')->nullable();
            $table->integer('views')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });

        // Events
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('title_fr');
            $table->string('title_en');
            $table->string('title_ar');
            $table->string('slug')->unique();
            $table->text('description_fr');
            $table->text('description_en');
            $table->text('description_ar');
            $table->string('location_fr')->nullable();
            $table->string('location_en')->nullable();
            $table->string('location_ar')->nullable();
            $table->dateTime('start_date');
            $table->dateTime('end_date')->nullable();
            $table->string('featured_image')->nullable();
            $table->string('created_by', 8)->constrained('users')->onDelete('cascade');
            $table->enum('status', ['draft', 'published', 'cancelled', 'archived'])->default('draft');
            $table->integer('capacity')->nullable();
            $table->integer('registrations')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });

        // Galleries
        Schema::create('galleries', function (Blueprint $table) {
            $table->id();
            $table->string('title_fr');
            $table->string('title_en');
            $table->string('title_ar');
            $table->string('slug')->unique();
            $table->text('description_fr')->nullable();
            $table->text('description_en')->nullable();
            $table->text('description_ar')->nullable();
            $table->string('created_by', 8)->constrained('users')->onDelete('cascade');
            $table->enum('status', ['draft', 'published', 'archived'])->default('draft');
            $table->timestamps();
            $table->softDeletes();
        });

        // Gallery Images
        Schema::create('gallery_images', function (Blueprint $table) {
            $table->id();
            $table->foreignId('gallery_id')->constrained()->onDelete('cascade');
            $table->string('image_url');
            $table->string('thumbnail_url')->nullable();
            $table->string('title_fr')->nullable();
            $table->string('title_en')->nullable();
            $table->string('title_ar')->nullable();
            $table->text('caption_fr')->nullable();
            $table->text('caption_en')->nullable();
            $table->text('caption_ar')->nullable();
            $table->integer('order')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('gallery_images');
        Schema::dropIfExists('galleries');
        Schema::dropIfExists('events');
        Schema::dropIfExists('news');
        Schema::dropIfExists('articles');
        Schema::dropIfExists('categories');
    }
};
