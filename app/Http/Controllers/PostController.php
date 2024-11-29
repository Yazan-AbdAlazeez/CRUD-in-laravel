<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::all();
        return view("posts.index", compact("posts"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePaths = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $imageName = $image->getClientOriginalName() . "." . time() . $image->getClientOriginalExtension();
                $image->move(public_path("/images/posts"), $imageName);
                $imagePaths[] =  $imageName;
            }
        }
        Post::create([
            'title' => $request->title,
            'description' => $request->description,
            'images' => $imagePaths,
        ]);
        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Delete old images from the server
        foreach ($post->images as $oldImage) {
            $oldImagePath = public_path('/images/posts/' . $oldImage);
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath); // Delete the old image file
            }
        }

        // Initialize an array for new image paths
        $imagePaths = [];

        // Check if new images are uploaded
        if ($request->hasFile('images')) {
            // Loop through each uploaded image
            foreach ($request->file('images') as $image) {
                $imageName = time() . '_' . $image->getClientOriginalName();
                $image->move(public_path('/images/posts'), $imageName);
                $imagePaths[] = $imageName; // Store the new image name in the array
            }
        }

        // Update the post with new images, replacing any existing images
        $post->update([
            'title' => $request->title,
            'description' => $request->description,
            'images' => $imagePaths, // Store new images as JSON
        ]);

        return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('posts.index');
    }
}
