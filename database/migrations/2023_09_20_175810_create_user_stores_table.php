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
        Schema::create('user_stores', function (Blueprint $table) {
            $table->id("id");
            $table->string("document");
            $table->unsignedBigInteger("store_id");
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->timestamps();

            $table->foreign("document")->references("document")->on("users")->onDelete("cascade");
            $table->foreign("store_id")->references("store_id")->on("stores")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_stores');
    }
};
