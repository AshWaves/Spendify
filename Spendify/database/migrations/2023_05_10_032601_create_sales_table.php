<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
			$table->bigInteger('buyer_id')->unsigned();
			$table->bigInteger('seller_id')->unsigned();
			$table->bigInteger('product_id')->unsigned();
			$table->date('date_sale');
            $table->timestamps();
			$table->softDeletes();
			$table->foreign('buyer_id')->references('id')->on('users')->onDelete('cascade');
			$table->foreign('seller_id')->references('id')->on('users')->onDelete('cascade');
			$table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales');
    }
};
