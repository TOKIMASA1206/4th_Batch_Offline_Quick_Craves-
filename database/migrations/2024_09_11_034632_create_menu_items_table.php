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
        Schema::create('menu_items', function (Blueprint $table) {
            $table->id();
            $table->string('item_image');
            $table->string('name');
            $table->string('slug');
            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade');
            $table->text('description');
            $table->double('price');
            $table->double('offer_price')->default(0);
            $table->boolean('show_at_home')->default(1);
            $table->boolean('status')->default(1);
            $table->timestamps();
        });
        // php artisan migrate:refresh --path=
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menu_items');
    }
};
