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
        Schema::create('product_sliders', function (Blueprint $table) {
            $table->id();

            $table -> string('title', 100);
            $table -> string('short_des', 200);
            $table -> string('price', 50);
            $table -> string('image', 500);

            $table -> unsignedBigInteger('product_id');
            $table -> foreign('product_id') -> references('id') -> on('products')
            -> restrictOnUpdate() -> restrictOnDelete();

            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_sliders');
    }
};
