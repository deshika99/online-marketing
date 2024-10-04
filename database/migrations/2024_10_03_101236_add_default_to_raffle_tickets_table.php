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
        Schema::table('raffle_tickets', function (Blueprint $table) {
            $table->boolean('default')->default(false);  // This will be used to set the default ticket
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('raffle_tickets', function (Blueprint $table) {
            //
        });
    }
};
