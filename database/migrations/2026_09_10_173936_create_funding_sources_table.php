<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('funding_sources', function (Blueprint $table) {
            $table->id();
            $table->string('title_fr');
            $table->string('title_en');
            $table->string('title_ar');
            $table->text('description_fr');
            $table->text('description_en');
            $table->text('description_ar');
            $table->enum('type', ['dotation_non_affectee', 'dotation_affectee', 'subvention_exceptionnelle', 'pret']);
            $table->decimal('amount', 12, 2)->nullable();
            $table->integer('fiscal_year')->nullable();
            $table->boolean('is_active')->default(true);
            $table->integer('order')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('funding_sources');
    }
};
