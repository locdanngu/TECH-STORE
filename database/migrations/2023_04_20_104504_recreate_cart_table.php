<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
{
    Schema::dropIfExists('cart');
    Schema::create('cart', function (Blueprint $table) {
        $table->unsignedBigInteger('idproduct');
        $table->unsignedBigInteger('id');
        $table->unsignedInteger('quatifier')->default(0);
        $table->timestamps();

        $table->foreign('idproduct')->references('id')->on('products')->onDelete('cascade');
        $table->foreign('id')->references('id')->on('users')->onDelete('cascade');

        $table->primary(['idproduct', 'id']);
    });
}

public function down()
{
    Schema::dropIfExists('cart');
}

};
