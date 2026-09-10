<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('competitions', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->string('title_fr');
            $table->string('title_en');
            $table->string('title_ar');
            $table->text('description_fr');
            $table->text('description_en');
            $table->text('description_ar');
            $table->date('start_date');
            $table->date('end_date');
            $table->enum('status', ['open', 'closed', 'upcoming'])->default('upcoming');
            $table->string('attachment_path')->nullable();
            $table->boolean('is_active')->default(true);
            $table->integer('order')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('competitions');
    }
};
