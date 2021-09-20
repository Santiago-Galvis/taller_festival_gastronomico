<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('comments')->insert([
            [
                'user_id' => 1,
                'restaurant_id' => 1,
                'comment' => 'Todo muy rico',
                'score' => 5,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

            [
                'user_id' => 1,
                'restaurant_id' => 2,
                'comment' => 'Me salio un pelito',
                'score' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

            [
                'user_id' => 1,
                'restaurant_id' => 3,
                'comment' => 'Buena la pizza',
                'score' => 4,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

            
        ]);
    }
}
