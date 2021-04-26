<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMeasurementsTable extends Migration
{
    /**
     * @return void
     */
    public function up(): void
    {
        Schema::create('measurements', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('type');
        });
    }

    /**
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('measurements');
    }
}
