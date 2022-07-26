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
        Schema::create('products_orders', function (Blueprint $table) {
            $table->id();
            $table->text('firstname', 55);
            $table->text('lastname', 55);
            $table->bigInteger('phone');
            $table->text('city', 100);
            $table->text('adress_delivery', 2500);
            $table->string('delivery_type');

            $table->foreignId('product_id')->constrained('products');
            $table->text('size', 2500);
            $table->string('price');
            $table->bigInteger('quantity');
            $table->string('payment_type');

            $table->bigInteger('status');

            $table->softDeletes();
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
        Schema::dropIfExists('product_orders');
    }
};
