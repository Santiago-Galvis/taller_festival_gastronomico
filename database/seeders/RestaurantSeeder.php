<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class RestaurantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('restaurants')->insert([
            [
                'user_id' => 1,
                'name' => 'Restaurante 1',
                'description' => 'Restaurante 1 Descripción',
                'city' => 'Manizales',
                'phone' => '0180000000',
                'category_id' => 1,
                'delivery' => 'y',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

            [
                'user_id' => 1,
                'name' => 'Restaurante 2',
                'description' => 'Restaurante 2 Descripción',
                'city' => 'Pereira',
                'phone' => '0180000000',
                'category_id' => 2,
                'delivery' => 'n',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            
            [
                'user_id' => 1,
                'name' => 'Restaurante 3',
                'description' => 'Restaurante 3 Descripción',
                'city' => 'Armenia',
                'phone' => '0180000000',
                'category_id' => 3,
                'delivery' => 'y',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

            [
                'user_id' => 1,
                'name' => 'Restaurante 4',
                'description' => 'Restaurante 4 Descripción',
                'city' => 'Cali',
                'phone' => '0180000000',
                'category_id' => 3,
                'delivery' => 'y',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
        ]);
    }
}
