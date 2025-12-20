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
        Schema::create('carousels', function (Blueprint $table) {
            $table->id();
            $table->string('background_image'); // Path to background image
            $table->string('first_text'); // Small text at top (e.g., "Best School")
            $table->string('second_text'); // Main heading (e.g., "Where Learning Meets...")
            $table->text('third_text'); // Description paragraph
            $table->boolean('is_active')->default(true); // To enable/disable slides
            $table->integer('sort_order')->default(0); // To control slide order
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carousels');
    }
};
