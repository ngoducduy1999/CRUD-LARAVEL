<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('product_configurations', function (Blueprint $table) {
            $table->unsignedBigInteger('product_item_id');
            $table->unsignedBigInteger('variation_option_id');
            $table->foreign('product_item_id')->references('id')->on('product_items')->onDelete('cascade');
            $table->foreign('variation_option_id')->references('id')->on('variation_options');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_configurations');
    }
};
