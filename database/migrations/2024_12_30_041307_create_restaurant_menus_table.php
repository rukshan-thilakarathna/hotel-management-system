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
        Schema::create('restaurant_menus', function (Blueprint $table) {
            $table->id(); // 'id' as primary key
            $table->string('name'); // 'name' as varchar
            $table->string('url')->nullable(); // 'url' as varchar
            $table->string('image')->nullable(); // 'image' as varchar
            $table->string('price'); // 'price' as varchar
            $table->string('weight')->nullable(); // 'weight' as varchar
            $table->string('discount')->nullable(); // 'discount' as varchar
            $table->timestamps(); // 'created_at' and 'updated_at'
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('restaurant_menus');
    }
};
