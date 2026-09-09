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
        Schema::create('page_sections', function (Blueprint $table) {
            $table->id();
            $table->string('page_slug'); // e.g., 'home', 'about', 'for-schools', 'for-researchers', 'for-villages', 'contact'
            $table->string('section_key'); // e.g., 'hero', 'intro_story', 'manifesto', etc.
            $table->string('section_name'); // Label for admin: "Hero Banner Utama"
            $table->string('title')->nullable();
            $table->text('subtitle')->nullable();
            $table->string('badge')->nullable();
            $table->longText('content')->nullable();
            $table->string('image')->nullable();
            $table->string('image_caption')->nullable();
            $table->string('button_text')->nullable();
            $table->string('button_link')->nullable();
            $table->string('secondary_button_text')->nullable();
            $table->string('secondary_button_link')->nullable();
            $table->json('items')->nullable(); // structured items like metrics, 4 pillars, steps, etc.
            $table->integer('order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();

            $table->unique(['page_slug', 'section_key']);
            $table->index(['page_slug', 'order']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('page_sections');
    }
};
