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
        Schema::create('customer_order', function (Blueprint $table) {
            $table->id();
            $table->string('order_code')->index();
            $table->string('customer_fname');
            $table->string('customer_lname');
            $table->string('phone');
            $table->string('email');
            $table->string('company_name')->nullable();
            $table->string('address');
            $table->string('apartment')->nullable();
            $table->string('city');
            $table->string('postal_code');
            $table->date('date');
            $table->decimal('total_cost', 15, 2);
            $table->decimal('discount', 15, 2)->nullable();
            $table->decimal('vat', 15, 2)->nullable();
            $table->timestamps();   
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customer_order');
    }
};