<?php

namespace Database\Seeders;

use App\Models\BlogCategory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class BlogCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     * @throws \Exception
     */
    public function run()
    {
        for ($i = 1; $i <= 10; $i++) {
            $created_at = random_int(1139376989, 1644298589);
            $updated_at = random_int(1262055681, 1644298589);

            DB::table((new BlogCategory())->getTable())->insert([
                'id' => $i,
                'name' => 'category-' . $i,
                'slug' => 'category_' . $i,
                'created_at' => date('Y-m-d H:i:s', $created_at),
                'updated_at' => date('Y-m-d H:i:s', $updated_at),
            ]);
        }
    }
}
