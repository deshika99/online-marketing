<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('inquiries', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('user_id'); //  foreign key for the user id
        $table->string('order_id');
        $table->string('email');
        $table->string('phone');
        $table->string('subject');
        $table->text('message');
        $table->text('reply')->nullable(); // Add the 'reply' column here, which can be null
        $table->timestamps();

        // adding the User ID Foreign Key Constraint 
        $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inquiries');
    }
};
