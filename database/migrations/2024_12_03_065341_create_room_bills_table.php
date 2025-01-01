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
        Schema::create('room_bills', function (Blueprint $table) {
            $table->id();
            $table->string('room_id');
            $table->string('user_id');
            $table->string('user_name');
            $table->string('user_mobile_number');
            $table->text('added_charges');
            $table->string('defult_charges');
            $table->string('other_charges');
            $table->string('total_charges');
            $table->string('discount');
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('room_bills');
    }
};
