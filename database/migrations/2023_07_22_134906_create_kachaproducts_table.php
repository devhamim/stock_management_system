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
        Schema::create('kachaproducts', function (Blueprint $table) {
            $table->id();
            $table->integer('kacha_id');
            $table->integer('seller_id');
            $table->integer('bf');
            $table->integer('weight');
            $table->integer('use');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kachaproducts');
    }
};
