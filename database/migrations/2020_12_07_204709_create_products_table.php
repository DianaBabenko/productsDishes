<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * @return void
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('status');
            $table->bigInteger('category_id');
            $table->date('expirationDate');
            $table->string('image')->nullable();

        });
    }

    /**
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
}
