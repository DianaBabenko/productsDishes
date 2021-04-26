<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RecipeSubcategories extends Migration
{
    /**
     * @return void
     */
    public function up(): void
    {
        Schema::create('recipe_subcategories', static function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->bigInteger('category_id');
        });
    }

    /**
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('recipe_subcategories');
    }
}
