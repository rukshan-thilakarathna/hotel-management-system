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
        Schema::create('room_availabilities', function (Blueprint $table) {
            $table->id();
            $table->string('room_id');
            $table->string('adults');
            $table->string('children');
            $table->string('1')->default(0);
            $table->string('2')->default(0);
            $table->string('3')->default(0);
            $table->string('4')->default(0);
            $table->string('5')->default(0);
            $table->string('6')->default(0);
            $table->string('7')->default(0);
            $table->string('8')->default(0);
            $table->string('9')->default(0);
            $table->string('10')->default(0);
            $table->string('11')->default(0);
            $table->string('12')->default(0);
            $table->string('13')->default(0);
            $table->string('14')->default(0);
            $table->string('15')->default(0);
            $table->string('16')->default(0);
            $table->string('17')->default(0);
            $table->string('18')->default(0);
            $table->string('19')->default(0);
            $table->string('20')->default(0);
            $table->string('21')->default(0);
            $table->string('22')->default(0);
            $table->string('23')->default(0);
            $table->string('24')->default(0);
            $table->string('25')->default(0);
            $table->string('26')->default(0);
            $table->string('27')->default(0);
            $table->string('28')->default(0);
            $table->string('29')->default(0);
            $table->string('30')->default(0);
            $table->string('31')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('room_availabilities');
    }
};
