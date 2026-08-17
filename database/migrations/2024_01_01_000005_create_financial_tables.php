<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Budget Categories
        Schema::create('budget_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name_fr');
            $table->string('name_en');
            $table->string('name_ar');
            $table->string('code')->unique();
            $table->text('description_fr')->nullable();
            $table->text('description_en')->nullable();
            $table->text('description_ar')->nullable();
            $table->enum('type', ['revenue', 'expenditure'])->default('expenditure');
            $table->integer('order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
            $table->softDeletes();
        });

        // Budgets
        Schema::create('budgets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('budget_category_id')->constrained()->onDelete('cascade');
            $table->integer('fiscal_year');
            $table->decimal('allocated_amount', 15, 2);
            $table->decimal('spent_amount', 15, 2)->default(0);
            $table->decimal('remaining_amount', 15, 2)->default(0);
            $table->enum('status', ['draft', 'approved', 'active', 'closed'])->default('draft');
            $table->text('description_fr')->nullable();
            $table->text('description_en')->nullable();
            $table->text('description_ar')->nullable();
            $table->string('created_by', 8)->constrained('users')->onDelete('cascade');
            $table->string('approved_by', 8)->nullable()->constrained('users')->onDelete('set null');
            $table->timestamp('approved_at')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        // Expenses
        Schema::create('expenses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('budget_id')->constrained()->onDelete('cascade');
            $table->string('description_fr');
            $table->string('description_en');
            $table->string('description_ar');
            $table->decimal('amount', 15, 2);
            $table->date('expense_date');
            $table->string('reference_number')->unique();
            $table->enum('status', ['pending', 'approved', 'rejected', 'paid'])->default('pending');
            $table->string('created_by', 8)->constrained('users')->onDelete('cascade');
            $table->string('approved_by', 8)->nullable()->constrained('users')->onDelete('set null');
            $table->timestamp('approved_at')->nullable();
            $table->text('notes')->nullable();
            $table->string('receipt_file')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        // Revenues
        Schema::create('revenues', function (Blueprint $table) {
            $table->id();
            $table->foreignId('budget_category_id')->constrained()->onDelete('cascade');
            $table->string('description_fr');
            $table->string('description_en');
            $table->string('description_ar');
            $table->decimal('amount', 15, 2);
            $table->date('revenue_date');
            $table->string('reference_number')->unique();
            $table->enum('source', ['taxes', 'permits', 'fees', 'donations', 'grants', 'other'])->default('other');
            $table->enum('status', ['pending', 'received', 'verified'])->default('pending');
            $table->string('created_by', 8)->constrained('users')->onDelete('cascade');
            $table->string('verified_by', 8)->nullable()->constrained('users')->onDelete('set null');
            $table->timestamp('verified_at')->nullable();
            $table->text('notes')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        // Budget Allocations
        Schema::create('budget_allocations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('budget_id')->constrained()->onDelete('cascade');
            $table->string('department_name');
            $table->decimal('allocated_amount', 15, 2);
            $table->decimal('spent_amount', 15, 2)->default(0);
            $table->enum('status', ['allocated', 'spent', 'closed'])->default('allocated');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('budget_allocations');
        Schema::dropIfExists('revenues');
        Schema::dropIfExists('expenses');
        Schema::dropIfExists('budgets');
        Schema::dropIfExists('budget_categories');
    }
};
