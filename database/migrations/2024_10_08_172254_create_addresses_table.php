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
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Reference to the users table
            $table->string('full_name');
            $table->string('phone_num', 15);
            $table->string('email');
            $table->string('address');
            $table->string('apartment')->nullable(); // Optional field
            $table->string('city');
            $table->string('postal_code', 10);
            $table->timestamps(); // Created at, updated at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('addresses');
    }
};
