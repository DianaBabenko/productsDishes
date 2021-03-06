<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ProductCategories extends Migration
{
    /**
     * @return void
     */
    public function up(): void
    {
        Schema::create('product_categories', static function (Blueprint $table) {
            $table->id();
            $table->string('name');
        });
    }

    /**
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('product_categories');
    }
}
