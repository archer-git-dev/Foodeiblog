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
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->text('text');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('recipe_id');
            $table->timestamps();
            $table->softDeletes();

            // IDX
            $table->index('user_id', 'comment_user_idx');
            $table->index('recipe_id', 'comment_recipe_idx');

            // FK
            $table->foreign('user_id', 'comment_user_fk')->on('users')->references('id');
            $table->foreign('recipe_id', 'comment_recipe_fk')->on('recipes')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};
