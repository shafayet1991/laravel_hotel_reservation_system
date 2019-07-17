<?php

use App\Models\Blog\BlogAuthor;
use Illuminate\Database\Seeder;

class BlogAuthorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        DB::table('blog_authors')->truncate();
        factory(BlogAuthor::class,10)->create();
    }
}
