<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Foundation\Auth\User;
use Carbon\Carbon;
use Faker\Factory as Faker;
use Faker\Provider\Lorem;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // insert a surats table
        $faker = Faker::create('id_ID');
        for ($i = 1; $i <= 50; $i++) {

            DB::table('surats')->insert([
                'letter_number' => $faker->randomNumber(5, true),
                'title' => $faker->word(),
                'category_id' => $faker->numberBetween(1, 3),
                'archive_time' => Carbon::now(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }

        // insert a category table
        DB::table('categories')->insert([
            'category_name' => 'Undangan',
        ]);
        DB::table('categories')->insert([
            'category_name' => 'Pengumuman',
        ]);
        DB::table('categories')->insert([
            'category_name' => 'Nota Dinas',
        ]);
        DB::table('categories')->insert([
            'category_name' => 'Pemberitahuan',
        ]);
    }
}
