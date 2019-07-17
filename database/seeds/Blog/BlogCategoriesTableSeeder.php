<?php

use App\Models\Blog\BlogCategory;
use Illuminate\Database\Seeder;

class BlogCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        DB::table('blog_categories')->truncate();
        factory(BlogCategory::class,10)->create();
    }
}
