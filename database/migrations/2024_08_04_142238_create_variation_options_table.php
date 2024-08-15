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
    Schema::create('variation_options', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('variation_id');
        $table->string('value');
        $table->foreign('variation_id')->references('id')->on('variations');
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('variation_options');
    }
};
