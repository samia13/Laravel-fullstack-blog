<?php

namespace Database\Seeders;

use App\Models\{User, Post};
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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

        // insert default user 
        DB::table('users')->insert([
            [
                'name' => 'samia',
                'email' => 'mahisamia13@gmail.com',
                'password' => Hash::make('12345678'),
                'role' =>   'admin',
                'valid' => 1
            ]
        ]);

        // insert categories
        DB::table('categories')->insert([
            [
                'title' => 'Category 1',
            ],
            [
                'title' => 'Category 2',
            ],
            [
                'title' => 'Category 3',
            ],
        ]);

        // insert tags 
        DB::table('tags')->insert([
            [
                'tag' => 'Tag 1', 
            ],
            [
                'tag' => 'Tag 2',
            ],
            [
                'tag' => 'Tag 3',
            ],
            [
                'tag' => 'Tag 4',
            ],
            [
                'tag' => 'Tag 5',
            ],
            [
                'tag' => 'Tag 6',
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
