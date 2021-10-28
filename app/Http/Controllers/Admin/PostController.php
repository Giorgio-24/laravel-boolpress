<?php

namespace App\Http\Controllers\Admin;

use App\Models\Tag;
use App\Models\Post;
use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::paginate(10);
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $string = 'create';
        $post = new Post();
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.posts.create', compact('tags', 'post', 'categories', 'string'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'unique:posts', 'string', 'min:5', 'max:50'],
            'content' => ['string'],
            'image' => ['string'],
            'category_id' => ['nullable', 'exists:categories,id'],
            'tags' => ['nullable', 'exists:tags,id',]
        ], [
            'required' => 'You must fill the :attribute field!',
            'unique' => 'The :attribute field must be unique!',
            'string' => 'You must insert a string!',
            'min' => 'The value is too short!',
            'max' => 'The value is too long!'
        ]);

        $data = $request->all();

        $post = Post::create($data);
        //Se ho dei tags allora creo la relazione.
        if (array_key_exists('tags', $data)) $post->tags()->attach($data['tags']);
        return redirect()->route('admin.posts.show', $post);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $string = 'edit';
        $categories = Category::all();
        $tags = Tag::all();
        $tagIds = $post->tags->pluck('id')->toArray();

        return view('admin.posts.edit', compact('post', 'string', 'categories', 'tags', 'tagIds'));
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
        $request->validate([
            'title' => ['required', Rule::unique('posts')->ignore($post->id), 'string', 'min:5', 'max:50'],
            'content' => ['string'],
            'image' => ['string'],
        ], [
            'required' => 'You must fill the :attribute field!',
            'unique' => 'The :attribute field must be unique!',
            'string' => 'You must insert a string!',
            'min' => 'The value is too short!',
            'max' => 'The value is too long!'
        ]);

        $data = $request->all();
        if (!array_key_exists('tags', $data) && count($post->tags)) $post->tags()->detach();
        else $post->tags()->sync($data['tags']);


        $post->update($data);

        return redirect()->route('admin.posts.show', compact('post'));
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
        return redirect()->route('comics.index');
    }
}
