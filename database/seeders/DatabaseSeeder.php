<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::truncate();
        Post::truncate();
        Category::truncate();

        \App\Models\User::factory(10)->create();


        $personal = \App\Models\Category::factory()->create([
            'name' => 'Personal',
            'slug' => 'personal',
        ]);

        $family = \App\Models\Category::factory()->create([
            'name' => 'Family',
            'slug' => 'family',
        ]);

        $work = \App\Models\Category::factory()->create([
            'name' => 'Work',
            'slug' => 'work',
        ]);
         

        Post::create([
            'user_id'=>$user->id,
            'category_id'=>$personal->id,
            'title'=>'My Personal Post', 
            'excerpt'=>'<p>Excerpt for my post</p>',
            'body'=>'<p>lalalalalalallalalalal</p>',
            'slug'=>'my-personal-post',
            'category_id'=>1
            ]);
        Post::create([
            'user_id'=>$user->id,
            'category_id'=>$family->id,
            'title'=>'My Family Post', 
            'excerpt'=>'<p>Excerpt for my post</p>',
            'body'=>'<p>lalalalalalallalalalal</p>',
            'slug'=>'my-famyly-post',                
            'category_id'=>2
            ]);
        Post::create([
            'user_id'=>$user->id,
            'category_id'=>$work->id,                
            'title'=>'My Work Post', 
            'excerpt'=>'<p>Excerpt for my post</p>',
            'body'=>'<p>lalalalalalallalalalal</p>',
            'slug'=>'my-work-post',                
            'category_id'=>3              
        ]);

    }
}
