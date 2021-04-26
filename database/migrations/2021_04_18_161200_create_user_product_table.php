<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserProductTable extends Migration
{
    /**
     * @return void
     */
    public function up(): void
    {
        Schema::create('user_product', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('product_id');
            $table->bigInteger('user_id');
//            $table->bigInteger('count');
            $table->timestamps();

            $table->index(['product_id', 'user_id']);
        });
    }

    /**
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('user_product');
    }
}
