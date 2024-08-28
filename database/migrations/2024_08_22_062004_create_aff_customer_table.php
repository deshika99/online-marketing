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
        Schema::create('aff_customers', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->string('address', 255)->nullable();
            $table->string('district', 255)->nullable();
            $table->date('DOB');
            $table->string('gender');
            $table->string('NIC', 20);
            $table->string('contactno', 20);
            $table->string('email', 255)->unique();
            $table->string('password', 20)->nullable();
            $table->string('status')->nullable();  
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aff_customers');
    }
};