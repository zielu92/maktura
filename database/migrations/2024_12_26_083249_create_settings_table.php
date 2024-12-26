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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();

            $table->string('seller_name')->nullable();
            $table->string('seller_company_name')->nullable();
            $table->string('seller_email')->nullable();
            $table->string('seller_phone')->nullable();
            $table->string('seller_address')->nullable();
            $table->string('seller_city')->nullable();
            $table->string('seller_postal_code')->nullable();
            $table->string('seller_country')->nullable();
            $table->string('seller_nip', 20)->nullable();
            $table->string('seller_regon', 20)->nullable();
            $table->string('seller_krs', 20)->nullable();

            $table->string('invoice_default_issuer')->nullable();
            $table->string('invoice_default_place')->nullable();
            $table->string('invoice_default_pattern')->default('{n}/{m}/{y}')->nullable();
            $table->string('invoice_default_tax_rate')->default('23')->nullable();
            $table->string('invoice_default_template')->default('default')->nullable();

            $table->unsignedBigInteger('company_id')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
