<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecipesTable extends Migration
{
    /**
     * @return void
     */
    public function up(): void
    {
        Schema::create('recipes', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description');
            $table->integer('personCount');
            $table->integer('cookTime');
            $table->integer('ingredientsNumber');
            $table->integer('subcategory_id');
            $table->string('image')->nullable();
            $table->bigInteger('user_id')->nullable();
            $table->integer('status');
            $table->timestamps();
        });
    }

    /**
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('recipes');
    }
}
