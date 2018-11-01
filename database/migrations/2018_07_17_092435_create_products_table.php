<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
           $table->increments('id');
           $table->string('pro_name');
           $table->integer('pro_price');
           $table->integer('pro_qty');
           $table->integer('pro_cat_id');
           $table->integer('pro_isfeatured');
           $table->string('pro_token');
           $table->enum('status', ['active','inactive']);
           $table->timestamps();
        });
        Schema::table('products', function($table){
            $table->foreign('pro_cat_id')->references('id')->on('procategories');
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
