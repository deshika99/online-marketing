<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('subcategories', function (Blueprint $table) {
            $table->id(); 
            $table->unsignedBigInteger('category_id'); 
            $table->string('subcategory')->nullable();  
            $table->timestamps(); 
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('subcategories');
    }
};
