<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('associations', function (Blueprint $table) {
            $table->string('president_mobile')->nullable()->after('president_phone');
            $table->string('contact_person_mobile')->nullable()->after('contact_person_phone');
        });
    }

    public function down(): void
    {
        Schema::table('associations', function (Blueprint $table) {
            $table->dropColumn(['president_mobile', 'contact_person_mobile']);
        });
    }
};
