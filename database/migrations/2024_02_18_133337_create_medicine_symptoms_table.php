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
        Schema::create('medicine_symptoms', function (Blueprint $table) {
            $table->id();
            $table->foreignId('symptom_id')
                ->constrained('symptoms')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->foreignId('medicine_id')
                ->constrained('medicines')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medicine_symptoms');
    }
};
