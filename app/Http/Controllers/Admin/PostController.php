<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Models\Category;
use App\Models\Post;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:admin']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();

        return view('admin.posts.index')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        return view('admin.posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\PostRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        if ($request->hasfile('cover_image')) {

            $fileUrl = $request->file('cover_image');
            $fileNameToStore = uniqid() . '_' . time() . '.' . $fileUrl->getClientOriginalExtension();
            $destinationPath = public_path('assets/attachments/');
            $fileUrl->move($destinationPath, $fileNameToStore); //Ajouter photo
        }

        $post = new Post();
        $post->title_post = $request->input('title_post');
        $post->description_post = $request->input('description_post');
        $post->body_post = $request->input('body_post');
        $post->status = $request->input('status');
        $post->user_id = auth()->user()->id;
        $post->category_id = $request->input('category_id');

        if ($request->hasfile('cover_image')) {
            $post->cover_image = $fileNameToStore;
        }

        $post->save();

        return redirect()->route('admin.posts.index')->with('success', trans('success.postpub'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::findOrFail($id); //Get post specified by id

        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id); //Get post specified by id
        $categories = Category::all();

        return view('admin.posts.edit', compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\PostRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, $id)
    {
        if ($request->hasfile('cover_image')) {

            $fileUrl = $request->file('cover_image');
            $fileNameToStore = uniqid() . '_' . time() . '.' . $fileUrl->getClientOriginalExtension();
            $destinationPath = public_path('/cover_images');
            $fileUrl->move($destinationPath, $fileNameToStore); //Ajouter photo

        }

        $post = Post::findOrFail($id); //Get post specified by id
        $post->title_post = $request->input('title_post');
        $post->description_post = $request->input('description_post');
        $post->body_post = $request->input('body_post');
        $post->status = $request->input('status');
        $post->category_id = $request->input('category_id');

        if ($request->hasfile('cover_image')) {
            $post->cover_image = $fileNameToStore;
        }

        $post->save();

        return redirect()->route('admin.posts.index')->with('success', trans('success.postpub'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id); //Find a post with a given id and delete
        $post->delete();

        return redirect()->route('admin.posts.index')->with('success', trans('success.postdele'));
    }
}
