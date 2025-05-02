<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use Devrabiul\ToastMagic\Facades\ToastMagic;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::with('user')->get();
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        $validated = $request->validated();

        // Handle file upload
        if ($request->hasfile('featured_image')) {
            $image = $request->file('featured_image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/posts'), $imageName);
            $validated['featured_image'] = 'uploads/posts/' . $imageName;
        }
        $validated['user_id'] = $request->user()->id;
        Post::create($validated);


        return redirect()->route('posts.index')->with(ToastMagic::success('Post created successfully'));
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $categories = Category::all();
        return view('admin.posts.edit', compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        $validated = $request->validated();

        // Handle file upload
        if ($request->hasfile('featured_image')) {
            $image = $request->file('featured_image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/posts'), $imageName);
            $validated['featured_image'] = 'uploads/posts/' . $imageName;
            // Delete old image if exists
            if ($post->featured_image && file_exists(public_path($post->featured_image))) {
                unlink(public_path($post->featured_image));
            }
        } else {
            $validated['featured_image'] = $post->featured_image;
        }

        $validated['user_id'] = $request->user()->id;

        $post->update($validated);

        return redirect()->route('posts.index')->with(ToastMagic::success('Post updated successfully'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        if ($post->featured_image && file_exists(public_path($post->featured_image))) {
            unlink(public_path($post->featured_image));
        }
        $post->delete();

        return redirect()->route('posts.index')->with(ToastMagic::success('Post deleted successfully'));
    }
}
