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
        Schema::create('room_bookings', function (Blueprint $table) {
            $table->id();
            $table->string('room_id');
            $table->string('user_id');
            $table->string('adults');
            $table->string('children');
            $table->string('booking_type');
            $table->string('check_in_time');
            $table->string('check_in_date');
            $table->string('check_out_time');
            $table->string('check_out_date');
            $table->string('status');
            $table->string('bill_id');
            $table->string('payment_status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('room_bookings');
    }
};
