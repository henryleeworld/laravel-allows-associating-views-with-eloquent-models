<?php

namespace Database\Seeders;

use App\Models\Post;
use CyrildeWit\EloquentViewable\View;
use Illuminate\Database\Seeder;

class ViewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $posts = Post::all();
        foreach ($posts as $post) {
            View::create([
                'viewable_id'   => $post->getKey(),
                'viewable_type' => $post->getMorphClass(),
                'visitor'       => session()->getId(),
            ]);
        }
    }
}
