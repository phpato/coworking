<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class RoomsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('rooms')->insert([
            [
                'name' => 'Sala A',
                'description' => 'Description for Room A',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Sala B',
                'description' => 'Description for Room B',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Sala C',
                'description' => 'Description for Room C',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
