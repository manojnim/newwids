<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id('productId');
            $table->string('productName')->nullable();
            $table->string('productPrice')->nullable();
            $table->unsignedInteger('productOrganizer_id')->nullable();
            $table->unsignedInteger('productCategory_id')->nullable();
            $table->string('productCoverpics')->nullable();
            $table->longText('productImages')->nullable();
            $table->longText('productDescription')->nullable();
            $table->tinyInteger('productIsfeatured')->default('0');
            $table->tinyInteger('productIsfeaturedStatus')->default('0');
            $table->tinyInteger('productIsfeaturedexpiry')->default('0');
            $table->tinyInteger('productStatus')->default('1');
            $table->string('productCreated_at')->nullable();
        });
    }
 
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
