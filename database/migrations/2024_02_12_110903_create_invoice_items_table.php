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
        Schema::create('invoice_items', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('description')->nullable();
            $table->string('quantity')->nullable();
            $table->decimal('price_net', 10, 2)->nullable();
            $table->decimal('price_gross', 10, 2)->nullable();
            $table->string('tax_rate')->nullable();
            $table->decimal('tax_amount', 10, 2)->nullable();
            $table->decimal('discount', 10, 2)->nullable();
            $table->decimal('discount_type', 10, 2)->nullable();
            $table->decimal('total_net', 10, 2)->nullable();
            $table->decimal('total_gross', 10, 2)->nullable();
            $table->decimal('total_tax', 10, 2)->nullable();
            $table->decimal('total_amount', 10, 2)->nullable();
            $table->decimal('total_discount', 10, 2)->nullable();
            $table->decimal('total_discount_type', 10, 2)->nullable();

            $table->foreignId('invoice_id')->references('id')->on('invoices')->onDelete('cascade');
            $table->unsignedBigInteger('company_id')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoice_items');
    }
};
