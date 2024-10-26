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
        Schema::create('recipes', function (Blueprint $table) {
            $table->id();
            $table->string('name');          // Recipe name
            $table->string('cuisine')->nullable(); // Instead of 'country'
            $table->text('ingredients');     // Ingredients list
            $table->text('instructions');    // Cooking instructions
            $table->timestamps();            // Created/Updated timestamps
        });
    }
   

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recipes');
    }
};
