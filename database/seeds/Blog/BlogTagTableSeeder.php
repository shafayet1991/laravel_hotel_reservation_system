<?php

use App\Models\Blog\Blog;
use App\Models\Blog\BlogCategory;
use Illuminate\Database\Seeder;

class BlogTagTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('blog_tag')->insert([
            ['blog_tag_id' => self::getRandomBlogTagId(), 'blog_id' => self::getRandomBlogId()],
            ['blog_tag_id' => self::getRandomBlogTagId(), 'blog_id' => self::getRandomBlogId()],
            ['blog_tag_id' => self::getRandomBlogTagId(), 'blog_id' => self::getRandomBlogId()],
            ['blog_tag_id' => self::getRandomBlogTagId(), 'blog_id' => self::getRandomBlogId()],
            ['blog_tag_id' => self::getRandomBlogTagId(), 'blog_id' => self::getRandomBlogId()],
            ['blog_tag_id' => self::getRandomBlogTagId(), 'blog_id' => self::getRandomBlogId()],
            ['blog_tag_id' => self::getRandomBlogTagId(), 'blog_id' => self::getRandomBlogId()],
            ['blog_tag_id' => self::getRandomBlogTagId(), 'blog_id' => self::getRandomBlogId()],
            ['blog_tag_id' => self::getRandomBlogTagId(), 'blog_id' => self::getRandomBlogId()],
            ['blog_tag_id' => self::getRandomBlogTagId(), 'blog_id' => self::getRandomBlogId()],
            ['blog_tag_id' => self::getRandomBlogTagId(), 'blog_id' => self::getRandomBlogId()],
            ['blog_tag_id' => self::getRandomBlogTagId(), 'blog_id' => self::getRandomBlogId()],
            ['blog_tag_id' => self::getRandomBlogTagId(), 'blog_id' => self::getRandomBlogId()],
            ['blog_tag_id' => self::getRandomBlogTagId(), 'blog_id' => self::getRandomBlogId()],
            ['blog_tag_id' => self::getRandomBlogTagId(), 'blog_id' => self::getRandomBlogId()],
            ['blog_tag_id' => self::getRandomBlogTagId(), 'blog_id' => self::getRandomBlogId()],
            ['blog_tag_id' => self::getRandomBlogTagId(), 'blog_id' => self::getRandomBlogId()],
            ['blog_tag_id' => self::getRandomBlogTagId(), 'blog_id' => self::getRandomBlogId()],
            ['blog_tag_id' => self::getRandomBlogTagId(), 'blog_id' => self::getRandomBlogId()],
            ['blog_tag_id' => self::getRandomBlogTagId(), 'blog_id' => self::getRandomBlogId()],
            ['blog_tag_id' => self::getRandomBlogTagId(), 'blog_id' => self::getRandomBlogId()],
            ['blog_tag_id' => self::getRandomBlogTagId(), 'blog_id' => self::getRandomBlogId()],
            ['blog_tag_id' => self::getRandomBlogTagId(), 'blog_id' => self::getRandomBlogId()],
            ['blog_tag_id' => self::getRandomBlogTagId(), 'blog_id' => self::getRandomBlogId()],
            ['blog_tag_id' => self::getRandomBlogTagId(), 'blog_id' => self::getRandomBlogId()],
            ['blog_tag_id' => self::getRandomBlogTagId(), 'blog_id' => self::getRandomBlogId()],
            ['blog_tag_id' => self::getRandomBlogTagId(), 'blog_id' => self::getRandomBlogId()],
            ['blog_tag_id' => self::getRandomBlogTagId(), 'blog_id' => self::getRandomBlogId()],
            ['blog_tag_id' => self::getRandomBlogTagId(), 'blog_id' => self::getRandomBlogId()],
            ['blog_tag_id' => self::getRandomBlogTagId(), 'blog_id' => self::getRandomBlogId()],
            ['blog_tag_id' => self::getRandomBlogTagId(), 'blog_id' => self::getRandomBlogId()],
            ['blog_tag_id' => self::getRandomBlogTagId(), 'blog_id' => self::getRandomBlogId()],
            ['blog_tag_id' => self::getRandomBlogTagId(), 'blog_id' => self::getRandomBlogId()],
            ['blog_tag_id' => self::getRandomBlogTagId(), 'blog_id' => self::getRandomBlogId()],
            ['blog_tag_id' => self::getRandomBlogTagId(), 'blog_id' => self::getRandomBlogId()],
            ['blog_tag_id' => self::getRandomBlogTagId(), 'blog_id' => self::getRandomBlogId()],
            ['blog_tag_id' => self::getRandomBlogTagId(), 'blog_id' => self::getRandomBlogId()],
            ['blog_tag_id' => self::getRandomBlogTagId(), 'blog_id' => self::getRandomBlogId()],
            ['blog_tag_id' => self::getRandomBlogTagId(), 'blog_id' => self::getRandomBlogId()],
            ['blog_tag_id' => self::getRandomBlogTagId(), 'blog_id' => self::getRandomBlogId()],
            ['blog_tag_id' => self::getRandomBlogTagId(), 'blog_id' => self::getRandomBlogId()],
            ['blog_tag_id' => self::getRandomBlogTagId(), 'blog_id' => self::getRandomBlogId()],
            ['blog_tag_id' => self::getRandomBlogTagId(), 'blog_id' => self::getRandomBlogId()],
            ['blog_tag_id' => self::getRandomBlogTagId(), 'blog_id' => self::getRandomBlogId()],
            ['blog_tag_id' => self::getRandomBlogTagId(), 'blog_id' => self::getRandomBlogId()],
        ]);
    }

    private static function getRandomBlogId()
    {
        $blog = Blog::inRandomOrder()->first();
        return $blog->id;
    }

    private static function getRandomBlogTagId()
    {
        $category = BlogCategory::inRandomOrder()->first();
        return $category->id;
    }
}
