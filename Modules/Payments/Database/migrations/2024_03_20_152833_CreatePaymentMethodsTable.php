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
        Schema::create('payment_method', function(Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->text('name')->nullable();
            $table->text('description')->nullable();
            $table->text('url')->nullable();
            $table->text('method');
            $table->boolean('active')->default(false);
            $table->unsignedBigInteger('company_id')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payment_method');
    }
};
