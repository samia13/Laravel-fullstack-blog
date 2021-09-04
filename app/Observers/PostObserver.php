<?php

namespace App\Observers;

use App\Models\{Post, Tag};

class PostObserver
{
    public $request;

    function __construct()
    {
        $this->request = request();
    }
    /**
     * Handle the Post "created" event.
     *
     * @param  \App\Models\Post  $post
     * @return void
     */
    public function created(Post $post)
    {
        $this->saveCategoryAndTag($post);
    }

    /**
     * Handle the Post "updated" event.
     *
     * @param  \App\Models\Post  $post
     * @return void
     */
    public function updated(Post $post)
    {
        $this->saveCategoryAndTag($post);
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

    function saveCategoryAndTag($post){

        if($this->request->has('category')) {
            $post->categories()->sync($this->request->category);
        }

        if($this->request->has('tags')) {
            $tags_id = [];
            
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
}
