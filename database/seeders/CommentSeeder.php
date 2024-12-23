<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        for ($i = 0; $i < 7; $i++) {
            $numberOfComment = fake()->numberBetween(1, 3);

            for ($j = 0; $j < $numberOfComment; $j++) {
                DB::table('comments')->insert([
                    'post_id' => $i + 1,
                    'name' => fake()->name,
                    'email' => fake()->email,
                    'comment' => fake()->sentence
                ]);
            }
        }
    }
}
