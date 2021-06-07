<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNullableFieldToProductRecipeTable extends Migration
{
    /**
     * @return void
     */
    public function up(): void
    {
        Schema::table('product_recipe', static function (Blueprint $table) {
            $table->json('product_substitutes')->nullable()->change();
        });
    }

    /**
     * @return void
     */
    public function down(): void
    {
        Schema::table('product_recipe', static function (Blueprint $table) {

        });
    }
}
