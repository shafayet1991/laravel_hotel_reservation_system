<?php

use App\Models\Blog\Blog;
use App\Models\Blog\BlogAuthor;
use Illuminate\Database\Seeder;

class BlogsTableSeeder extends Seeder
{
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        DB::table('blogs')->truncate();
        factory(Blog::class,10)->create([
            'author_id' => $this->getRandomAuthorId(),
        ]);
    }

    private function getRandomAuthorId()
    {
        $author = BlogAuthor::inRandomOrder()->first();
        return $author->id;
    }
}
