<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('permit_committee_meetings', function (Blueprint $table) {
            $table->id();
            $table->dateTime('meeting_date');
            $table->string('location')->nullable();
            $table->text('agenda_fr')->nullable();
            $table->text('agenda_en')->nullable();
            $table->text('agenda_ar')->nullable();
            $table->boolean('is_active')->default(true);
            $table->integer('order')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('permit_committee_meetings');
    }
};
