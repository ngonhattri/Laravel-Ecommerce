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
            $table->string('name');
            $table->string('alias')->nullable();
            $table->text('content');
            $table->text('gallery');
            $table->integer('price');
            $table->string('facebook')->nullable();
            $table->integer('phone');
            $table->boolean('status')->default(false);
            $table->string('meta_keyword')->nullable();
            $table->text('meta_description')->nullable();
            $table->integer('id_category')->unsigned()->nullable();
            $table->boolean('out_of_stock')->default(true);
            $table->integer('quantity')->default(0);
            $table->foreign('id_category')->references('id')->on('categories')->onDelete('set null');
            $table->integer('id_user')->unsigned();
            $table->foreign('id_user')->references('id')->on('users');
            $table->timestamps();
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
