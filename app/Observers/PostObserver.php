<?php

namespace App\Observers;

use App\Models\{Post, Tag};
use Illuminate\Http\Request;

class PostObserver
{
    public $request;

    function __construct(Request $request)
    {
        $this->request = $request;
    }
    /**
     * Handle the Post "created" event.
     *
     * @param  \App\Models\Post  $post
     * @return void
     */
    public function created(Post $post)
    {
        $post->categories()->sync($this->request->category);

        // Tags
        $tags_id = [];
        if($this->request->tags) {
            
            $tags = explode(',', $this->request->tags);
            foreach ($tags as $tag) {
                $created_tag = Tag::firstOrCreate([
                    'tag' => trim($tag)
                ]);
                array_push($tags_id, $created_tag->id);
            }
            $post->tags()->sync($tags_id);
        }
    }

    /**
     * Handle the Post "updated" event.
     *
     * @param  \App\Models\Post  $post
     * @return void
     */
    public function updated(Post $post)
    {
        //
    }

    /**
     * Handle the Post "deleted" event.
     *
     * @param  \App\Models\Post  $post
     * @return void
     */
    public function deleted(Post $post)
    {
        //
    }

    /**
     * Handle the Post "restored" event.
     *
     * @param  \App\Models\Post  $post
     * @return void
     */
    public function restored(Post $post)
    {
        //
    }

    /**
     * Handle the Post "force deleted" event.
     *
     * @param  \App\Models\Post  $post
     * @return void
     */
    public function forceDeleted(Post $post)
    {
        //
    }
}
