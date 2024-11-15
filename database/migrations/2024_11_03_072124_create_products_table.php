<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('product', function (Blueprint $table) {
            $table->id();
            $table->string('image');
            $table->string('nama');
            $table->string('link_shopee')->nullable();
            $table->string('link_tokped')->nullable();
            $table->string('link_tiktok')->nullable();
            $table->unsignedBigInteger('tag_product_id');
            $table->foreign('tag_product_id')
                ->references('id')
                ->on('tag_product')
                ->onDelete('cascade');
            $table->timestamps();
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product');
    }
};
