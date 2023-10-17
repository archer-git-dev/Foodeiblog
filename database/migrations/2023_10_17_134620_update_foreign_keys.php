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

        // comments foreign
        Schema::table('comments', function (Blueprint $table) {

            // user_id

            $table->unsignedBigInteger('user_id')->nullable()->change();

            $table->dropForeign('comment_user_fk');

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');


            // recipe_id
            $table->unsignedBigInteger('recipe_id')->nullable()->change();

            $table->dropForeign('comment_recipe_fk');

            $table->foreign('recipe_id')
                ->references('id')
                ->on('recipes')
                ->onDelete('cascade')
                ->onUpdate('cascade');

        });

        // recipes foreign
        Schema::table('recipes', function (Blueprint $table) {

            // user_id
            $table->unsignedBigInteger('user_id')->nullable()->change();

            $table->dropForeign('recipe_user_fk');

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');


            // category_id
            $table->unsignedBigInteger('category_id')->nullable()->change();

            $table->dropForeign('recipe_category_fk');

            $table->foreign('category_id')
                ->references('id')
                ->on('categories')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });



        // recipe_tags foreign
        Schema::table('recipe_tags', function (Blueprint $table) {

            // recipe_id
            $table->unsignedBigInteger('recipe_id')->nullable()->change();

            $table->dropForeign('recipe_tag_recipe_fk');

            $table->foreign('recipe_id')
                ->references('id')
                ->on('recipes')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            // tag_id
            $table->unsignedBigInteger('tag_id')->nullable()->change();

            $table->dropForeign('recipe_tag_tag_fk');

            $table->foreign('tag_id')
                ->references('id')
                ->on('tags')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('comments', function (Blueprint $table) {
            $table->dropForeign('comments_user_id_foreign');
            $table->dropForeign('comments_recipe_id_foreign');
        });

        Schema::table('recipes', function (Blueprint $table) {
            $table->dropForeign('recipes_user_id_foreign');
            $table->dropForeign('recipes_category_id_foreign');
        });

        Schema::table('recipe_tags', function (Blueprint $table) {
            $table->dropForeign('recipe_tags_recipe_id_foreign');
            $table->dropForeign('recipe_tags_tag_id_foreign');
        });

    }
};
