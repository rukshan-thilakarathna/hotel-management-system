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
        Schema::create('restaurant_orders', function (Blueprint $table) {
            $table->id();
            $table->string('order_id');
            $table->string('user_id');
            $table->string('user_name');
            $table->string('room_id');
            $table->text('Items');
            $table->string('type_of_order');
            $table->string('service_charge');
            $table->string('vat_charge');
            $table->string('total_amount');
            $table->string('order_status');
            $table->string('payment_status');
            $table->string('added_user');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('restaurant_orders');
    }
};
