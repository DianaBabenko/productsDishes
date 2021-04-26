<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RecipeCategories extends Migration
{
    /**
     * @return void
     */
    public function up(): void
    {
        Schema::create('recipe_categories', static function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('image')->nullable();
        });
    }

    /**
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('recipe_categories');
    }
}
