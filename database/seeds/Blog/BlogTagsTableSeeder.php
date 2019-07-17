<?php

use App\Models\Blog\BlogTag;
use Illuminate\Database\Seeder;

class BlogTagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        DB::table('blog_tags')->truncate();
        factory(BlogTag::class,10)->create();
    }
}
