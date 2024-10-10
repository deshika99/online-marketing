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
        Schema::create('affiliate_referrals', function (Blueprint $table) {
            $table->id();

            // Foreign key to users table (affiliate)
            $table->unsignedBigInteger('user_id');

            // Foreign key to raffle tickets table (tracking ID)
            $table->unsignedBigInteger('raffle_ticket_id');
            $table->foreign('raffle_ticket_id')->references('id')->on('raffle_tickets')->onDelete('cascade');

            // Store the product URL instead of product ID
            $table->string('product_url'); // This will store the full product link

            $table->integer('views_count')->default(0);
            $table->integer('referral_count')->default(0);
            $table->decimal('product_price', 10, 2)->default(0); // Initially set to 0
            $table->decimal('affiliate_commission', 10, 2)->default(0); // Initially set to 0
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('affiliate_referrals');
    }
};
