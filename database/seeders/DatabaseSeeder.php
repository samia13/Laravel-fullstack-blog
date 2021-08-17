<?php

namespace Database\Seeders;

use App\Models\{User, Post};
use Illuminate\Database\Seeder;
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
        User::factory()->create([
            'role' => 'admin',
        ]);
        User::factory()->count(4)->create([
            'role' => 'author',
        ]);
        User::factory()->count(8)->create();

        // insert categories
        DB::table('categories')->insert([
            [
                'title' => 'Category 1',
                'slug' => 'category-1'
            ],
            [
                'title' => 'Category 2',
                'slug' => 'category-2'
            ],
            [
                'title' => 'Category 3',
                'slug' => 'category-3'
            ],
        ]);

        // insert tags 
        DB::table('tags')->insert([
            [
                'tag' => 'Tag 1', 
                'slug' => 'tag-1'
            ],
            [
                'tag' => 'Tag 2',
                 'slug' => 'tag-2'
            ],
            [
                'tag' => 'Tag 3',
                 'slug' => 'tag-3'
            ],
            [
                'tag' => 'Tag 4',
                 'slug' => 'tag-4'
            ],
            [
                'tag' => 'Tag 5',
                 'slug' => 'tag-5'
            ],
            [
                'tag' => 'Tag 6',
                 'slug' => 'tag-6'
            ]
        ]);

        // seed some posts 
        foreach (range(1, 3) as $i) {
            Post::factory()->create([
                'title' => 'Post ' . $i,
                'slug' => 'post-' . $i,
                'user_id' => 3,
                'image' => 'img0' . $i . '.jpg',
            ]);
        }
        foreach (range(4, 10) as $i) {
            Post::factory()->create([
                'title' => 'Post ' . $i,
                'slug' => 'post-' . $i,
                'user_id' => 4,
                'image' => 'img0' . $i . '.jpg',
            ]);
        }
    }

}
