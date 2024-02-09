<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained('categories', 'id')->onDelete('cascade');
            $table->foreignId('subcategory_id')->constrained('subcategories', 'id')->onDelete('cascade');
            $table->integer('childcategory_id')->nullable();
            $table->integer('brand_id')->nullable();
            $table->integer('warehouse_id')->nullable();
            $table->integer('flash_deal_id')->nullable();
            $table->integer('pickuppoint_id')->nullable();
            $table->integer('admin_id')->nullable();
            $table->string('name');
            $table->string('code');
            $table->string('unit')->nullable();
            $table->string('tags')->nullable();
            $table->string('video')->nullable();
            $table->string('pur_price')->nullable();
            $table->string('sell_price')->nullable();
            $table->string('dis_price')->nullable();
            $table->string('stock_qty')->nullable();
            $table->string('description')->nullable();
            $table->string('thumbnail')->nullable();
            $table->string('images')->nullable();
            $table->integer('today_deal')->nullable();
            $table->integer('cash_od')->nullable();
            $table->enum('featured',['yes','no'])->default('no');
            $table->enum('status',['active','deactive'])->default('deactive');
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
};
