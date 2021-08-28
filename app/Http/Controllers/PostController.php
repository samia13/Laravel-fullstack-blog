<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\{Post, Tag};
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $posts = Post::all();
        return view('back.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = array_merge(['user_id' => auth()->id()], $request->post());

        $post = Post::create($data);
        $this->saveCategoriesAndTags($post, $request);
        session()->flash('addPostSuccess', 'Post created successfully');
        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
        return view('back.posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
        // dd($request->post());
        $post->update($request->post());
        $this->saveCategoriesAndTags($post, $request);
        session()->flash('updatePostSuccess', 'Post updated successfully');
        return back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return back();
    }

    protected function saveCategoriesAndTags($post, $request)
    {
        // Categorie
        $post->categories()->sync($request->category);

        // Tags
        $tags_id = [];
        if($request->tags) {
            
            $tags = explode(',', $request->tags);
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
