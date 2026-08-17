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
        // Drop tables not needed for the municipal portal project
        
        // Drop activity_logs (not needed - no activity tracking requirement)
        Schema::dropIfExists('activity_logs');
        
        // Drop audit_logs (not needed - no audit requirement)
        Schema::dropIfExists('audit_logs');
        
        // Drop event_registrations (no event registration/ticketing)
        Schema::dropIfExists('event_registrations');
        
        // Drop expenses (no financial management - expense approval)
        Schema::dropIfExists('expenses');
        
        // Drop messages (no internal messaging system)
        Schema::dropIfExists('messages');
        
        // Drop revenues (no financial management - revenue tracking)
        Schema::dropIfExists('revenues');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
