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
    
        Schema::create('affiliate_links', function (Blueprint $table) {
            $table->id(); // Primary key
            
            // Foreign key to users table (who generated the link)
            $table->unsignedBigInteger('user_id');

            // Foreign key to raffle_tickets table (tracking ID)
            $table->unsignedBigInteger('raffle_ticket_id');
            $table->foreign('raffle_ticket_id')->references('id')->on('raffle_tickets')->onDelete('cascade');

            // Store the generated affiliate link
            $table->string('link');

            // Laravel default timestamps (created_at and updated_at)
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('affiliate_links');
    }
};
