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
        Schema::create('ship_modules', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('module_name', 25)->unique(); // Unique module name
            $table->boolean('is_workable'); // Boolean to indicate if the module is workable
            $table->timestamps(); // For created_at and updated_at
        });
    }
    
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ship_modules');
    }
};
