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
            $table->string('title');
            $table->text('subtitle');
            $table->text('ingredients');
            $table->text('process');
            $table->string('image')->nullable()->default('recipe_images/default_recipe.jpg');
            $table->string('slug');
            $table->unsignedBigInteger('category_id')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->index('category_id', 'recipe_category_idx');
            $table->foreign('category_id', 'recipe_category_fk')->on('categories')->references('id');
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
