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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->string('no');
            $table->unsignedBigInteger('buyer_id');
            $table->string('type');
            $table->string('status');
            $table->string('payment_status');
            $table->string('place')->nullable();
            $table->date('sale_date')->nullable();
            $table->date('due_date')->nullable();
            $table->string('issue_date');
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('payment_method_id');
            $table->string('comment')->nullable();
            $table->string('currency',4)->default('EUR');
            $table->string('issuer_name')->nullable();
            $table->decimal('total_net', 10, 2)->default(0);
            $table->decimal('total_gross', 10, 2)->default(0);
            $table->decimal('total_tax', 10, 2)->default(0);
            $table->decimal('total_discount', 10, 2)->default(0);
            $table->decimal('paid', 10, 2)->default(0);
            $table->decimal('due', 10, 2)->default(0);
            $table->string('path')->nullable();
            //future
            $table->unsignedBigInteger('company_id')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
