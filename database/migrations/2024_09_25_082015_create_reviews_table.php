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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); 
            $table->string('product_id')->constrained()->onDelete('cascade');
            $table->string('order_code')->nullable();
            $table->string('rating')->nullable();
            $table->text('comment')->nullable(); 
            $table->enum('status', ['pending', 'published', 'rejected'])->default('pending');
            $table->boolean('is_anonymous')->default(false); 
            $table->timestamps(); 
        });
        
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
