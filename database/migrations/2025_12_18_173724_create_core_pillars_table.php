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
        Schema::create('core_pillars', function (Blueprint $table) {
            $table->id();
            $table->string('icon'); // FontAwesome icon class (e.g., 'fa-child')
            $table->string('icon_color'); // Background color class (e.g., 'bg-primary')
            $table->string('title'); // Card title
            $table->text('description'); // Card description
            $table->integer('sort_order')->default(0); // Display order
            $table->boolean('is_active')->default(true); // Active status
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('core_pillars');
    }
};
