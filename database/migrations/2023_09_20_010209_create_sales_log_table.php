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
        Schema::create('sales_log', function (Blueprint $table) {
            $table->id("log_id");
            $table->unsignedBigInteger("product_id");
            $table->foreign("product_id")->references("product_id")->on("products")->onDelete("cascade");
            $table->string("status");
            $table->Integer("delivery_time");
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
        Schema::dropIfExists('sales_log');
    }
};
