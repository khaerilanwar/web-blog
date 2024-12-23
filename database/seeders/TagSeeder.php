<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tags = [
            'Travel', // Tag 1 - Traveling
            'Adventure', // Tag 2 - Traveling
            'Wanderlust', // Tag 3 - Traveling
            'Travel Blog', // Tag 4 - Traveling
            'Explore The World', // Tag 5 - Traveling
            'Travel Tips', // Tag 6 - Traveling
            'Travel Destinations', // Tag 7 - Traveling
            'Nature Lovers', // Tag 8 - Traveling
            'Vacation', // Tag 9 - Traveling
            'Travel Goals', // Tag 10 - Traveling

            'Lifestyle', // Tag 11 - Lifestyle
            'Daily Life', // Tag 12 - Lifestyle
            'Healthy Lifestyle', // Tag 13 - Lifestyle
            'Minimalism', // Tag 14 - Lifestyle
            'Life Goals', // Tag 15 - Lifestyle
            'Self Care', // Tag 16 - Lifestyle
            'Wellness', // Tag 17 - Lifestyle
            'Happiness', // Tag 18 - Lifestyle
            'Inspiration', // Tag 19 - Lifestyle
            'Mindfulness', // Tag 20 - Lifestyle

            'Programming', // Tag 21 - Programming
            'Code Life', // Tag 22 - Programming
            'Developer', // Tag 23 - Programming
            'Coding', // Tag 24 - Programming
            'Tech', // Tag 25 - Programming
            'Web Development', // Tag 26 - Programming
            'Learn To Code', // Tag 27 - Programming
            'Programming Tips', // Tag 28 - Programming
            'Code Newbie', // Tag 29 - Programming
            'JavaScript', // Tag 30 - Programming

            'Tutorial', // Tag 31 - Tutorial
            'How To', // Tag 32 - Tutorial
            'Step By Step', // Tag 33 - Tutorial
            'Learn Something New', // Tag 34 - Tutorial
            'Guide', // Tag 35 - Tutorial
            'Tips And Tricks', // Tag 36 - Tutorial
            'Educational Content', // Tag 37 - Tutorial
            'DIY', // Tag 38 - Tutorial
            'Online Learning', // Tag 39 - Tutorial
            'Tech Tutorials', // Tag 40 - Tutorial
        ];

        foreach ($tags as $tag) {
            DB::table('tags')->insert([
                'name' => $tag,
                'slug' => Str::slug($tag)
            ]);
        }
    }
}
