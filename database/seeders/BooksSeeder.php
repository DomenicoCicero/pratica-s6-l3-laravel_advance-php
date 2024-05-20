<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class BooksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $faker = Faker::create();

        for($i = 0; $i < 20; $i++) {
            DB::table('books')->insert([
                'title' => fake()->word(rand(3, 10), true),
                'price' => rand(100, 350),
                'author' => fake()->name(),
                'img' => fake()->imageUrl(640, 480),
            ]);
        }
    }
}
