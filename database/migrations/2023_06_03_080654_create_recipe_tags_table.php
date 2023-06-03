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
        Schema::create('recipe_tags', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('recipe_id');
            $table->unsignedBigInteger('tag_id');
            $table->timestamps();
            $table->softDeletes();

            // IDX
            $table->index('recipe_id', 'recipe_tag_recipe_idx');
            $table->index('tag_id', 'recipe_tag_tag_idx');

            // FK
            $table->foreign('recipe_id', 'recipe_tag_recipe_fk')->on('recipes')->references('id');
            $table->foreign('tag_id', 'recipe_tag_tag_fk')->on('tags')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recipe_tags');
    }
};
