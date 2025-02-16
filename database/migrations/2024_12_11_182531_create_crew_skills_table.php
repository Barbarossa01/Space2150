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
        Schema::create('crew_skills', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->foreignId('module_crew_id')->constrained('module_crew'); // Foreign key to module_crew
            $table->string('name', 15)->unique(); // Unique skill name
            $table->timestamps(); // For created_at and updated_at
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('crew_skills');
    }
};
