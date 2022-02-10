<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     * @throws \Exception
     */
    public function run()
    {
        for ($i = 1; $i < 10; $i++) {
            $created_at = random_int(1139376989, 1644298589);
            $updated_at = random_int(1262055681, 1644298589);

            DB::table('blog')->insert([
                'id' => $i,
                'title' => 'blog-' . $i,
                'slug' => 'blog' . $i,
                'author_id' => 1,
                'text' => Str::random(555),
                'description' => Str::random(255),
                'picture' => '',
                'category_id' => random_int(1, 10),
                'created_at' => date('Y-m-d H:i:s', $created_at),
                'updated_at' => date('Y-m-d H:i:s', $updated_at),
            ]);
        }
    }
}
