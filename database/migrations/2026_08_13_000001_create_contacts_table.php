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
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('telephone')->nullable();
            $table->string('fax')->nullable();
            $table->string('adresse_fr')->nullable();
            $table->string('adresse_en')->nullable();
            $table->string('adresse_ar')->nullable();
            $table->string('service_fr')->nullable();
            $table->string('service_en')->nullable();
            $table->string('service_ar')->nullable();
            $table->text('description_fr')->nullable();
            $table->text('description_en')->nullable();
            $table->text('description_ar')->nullable();
            $table->string('slug')->nullable()->unique();
            $table->string('status')->default('PUBLISHED');
            $table->boolean('featured')->default(false);
            $table->string('creerPar')->nullable();
            $table->string('modifierPar')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contacts');
    }
};
