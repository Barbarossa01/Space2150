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
        Schema::create('module_crew', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->foreignId('ship_module_id')->constrained('ship_modules'); // Foreign key to ship_modules
            $table->string('nick', 10)->unique(); // Unique nickname
            $table->char('gender', 1); // Gender as F, M, or N
            $table->integer('age')->unsigned(); // Positive integer for age
            $table->timestamps(); // For created_at and updated_at
        });
    }
    
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('module_crew');
    }
};
