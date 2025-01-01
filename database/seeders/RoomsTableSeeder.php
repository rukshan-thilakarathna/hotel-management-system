<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoomsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('rooms')->insert([
            [
                'number' => '101',
                'size' => '25 sqm',
                'image' => 'room101.jpg',
                'description' => 'A cozy single room with a great view.',
                'price' => '50.00',
                'status' => 'available',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'number' => '102',
                'size' => '30 sqm',
                'image' => 'room102.jpg',
                'description' => 'Spacious double room with modern amenities.',
                'price' => '75.00',
                'status' => 'available',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'number' => '103',
                'size' => '40 sqm',
                'image' => 'room103.jpg',
                'description' => 'Luxury suite with premium facilities.',
                'price' => '120.00',
                'status' => 'occupied',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
