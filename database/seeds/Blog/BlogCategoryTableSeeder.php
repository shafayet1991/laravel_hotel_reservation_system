<?php

use App\Models\Blog\Blog;
use App\Models\Blog\BlogCategory;
use Illuminate\Database\Seeder;

class BlogCategoryTableSeeder extends Seeder
{
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        DB::table('blog_category')->truncate();
        DB::table('blog_category')->insert([
            ['blog_category_id' => self::getRandomBlogCategoryId(), 'blog_id' => self::getRandomBlogId()],
            ['blog_category_id' => self::getRandomBlogCategoryId(), 'blog_id' => self::getRandomBlogId()],
            ['blog_category_id' => self::getRandomBlogCategoryId(), 'blog_id' => self::getRandomBlogId()],
            ['blog_category_id' => self::getRandomBlogCategoryId(), 'blog_id' => self::getRandomBlogId()],
            ['blog_category_id' => self::getRandomBlogCategoryId(), 'blog_id' => self::getRandomBlogId()],
            ['blog_category_id' => self::getRandomBlogCategoryId(), 'blog_id' => self::getRandomBlogId()],
            ['blog_category_id' => self::getRandomBlogCategoryId(), 'blog_id' => self::getRandomBlogId()],
            ['blog_category_id' => self::getRandomBlogCategoryId(), 'blog_id' => self::getRandomBlogId()],
            ['blog_category_id' => self::getRandomBlogCategoryId(), 'blog_id' => self::getRandomBlogId()],
            ['blog_category_id' => self::getRandomBlogCategoryId(), 'blog_id' => self::getRandomBlogId()],
            ['blog_category_id' => self::getRandomBlogCategoryId(), 'blog_id' => self::getRandomBlogId()],
            ['blog_category_id' => self::getRandomBlogCategoryId(), 'blog_id' => self::getRandomBlogId()],
            ['blog_category_id' => self::getRandomBlogCategoryId(), 'blog_id' => self::getRandomBlogId()],
            ['blog_category_id' => self::getRandomBlogCategoryId(), 'blog_id' => self::getRandomBlogId()],
            ['blog_category_id' => self::getRandomBlogCategoryId(), 'blog_id' => self::getRandomBlogId()],
            ['blog_category_id' => self::getRandomBlogCategoryId(), 'blog_id' => self::getRandomBlogId()],
            ['blog_category_id' => self::getRandomBlogCategoryId(), 'blog_id' => self::getRandomBlogId()],
            ['blog_category_id' => self::getRandomBlogCategoryId(), 'blog_id' => self::getRandomBlogId()],
            ['blog_category_id' => self::getRandomBlogCategoryId(), 'blog_id' => self::getRandomBlogId()],
            ['blog_category_id' => self::getRandomBlogCategoryId(), 'blog_id' => self::getRandomBlogId()],
            ['blog_category_id' => self::getRandomBlogCategoryId(), 'blog_id' => self::getRandomBlogId()],
            ['blog_category_id' => self::getRandomBlogCategoryId(), 'blog_id' => self::getRandomBlogId()],
            ['blog_category_id' => self::getRandomBlogCategoryId(), 'blog_id' => self::getRandomBlogId()],
            ['blog_category_id' => self::getRandomBlogCategoryId(), 'blog_id' => self::getRandomBlogId()],
            ['blog_category_id' => self::getRandomBlogCategoryId(), 'blog_id' => self::getRandomBlogId()],
            ['blog_category_id' => self::getRandomBlogCategoryId(), 'blog_id' => self::getRandomBlogId()],
            ['blog_category_id' => self::getRandomBlogCategoryId(), 'blog_id' => self::getRandomBlogId()],
            ['blog_category_id' => self::getRandomBlogCategoryId(), 'blog_id' => self::getRandomBlogId()],
            ['blog_category_id' => self::getRandomBlogCategoryId(), 'blog_id' => self::getRandomBlogId()],
            ['blog_category_id' => self::getRandomBlogCategoryId(), 'blog_id' => self::getRandomBlogId()],
            ['blog_category_id' => self::getRandomBlogCategoryId(), 'blog_id' => self::getRandomBlogId()],
            ['blog_category_id' => self::getRandomBlogCategoryId(), 'blog_id' => self::getRandomBlogId()],
            ['blog_category_id' => self::getRandomBlogCategoryId(), 'blog_id' => self::getRandomBlogId()],
            ['blog_category_id' => self::getRandomBlogCategoryId(), 'blog_id' => self::getRandomBlogId()],
            ['blog_category_id' => self::getRandomBlogCategoryId(), 'blog_id' => self::getRandomBlogId()],
            ['blog_category_id' => self::getRandomBlogCategoryId(), 'blog_id' => self::getRandomBlogId()],
        ]);
    }

    private static function getRandomBlogId()
    {
        $blog = Blog::inRandomOrder()->first();
        return $blog->id;
    }

    private static function getRandomBlogCategoryId()
    {
        $category = BlogCategory::inRandomOrder()->first();
        return $category->id;
    }
}
