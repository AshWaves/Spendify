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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
			$table->bigInteger('category_id')->unsigned();
			$table->bigInteger('seller_id')->unsigned();
			$table->string('name');
			$table->double('price')->unsigned();
			$table->integer('stock')->unsigned();
			$table->enum('status',['avalible', 'not avalible']);
			$table->text('description');
            $table->timestamps();
			$table->softDeletes();
			$table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
			$table->foreign('seller_id')->references('id')->on('users')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
