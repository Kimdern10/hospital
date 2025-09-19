<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogPost;
use App\Models\BlogTopic;
use Illuminate\Http\Request;

class BlogPostController extends Controller
{
    // List all posts
    public function index()
    {
        $posts = BlogPost::with('topic')->latest()->paginate(3);
        return view('admin.blog.list', compact('posts'));
    }

    // Show create form
    public function create()
    {
        $topics = BlogTopic::all();
        return view('admin.blog.create', compact('topics'));
    }

    // Store blog post
    public function store(Request $request)
    {
        $request->validate([
            'topic_id' => 'required|exists:blog_topics,id',
            'title'    => 'required|string|max:255',
            'content'  => 'required',
            'image'    => 'nullable|image|max:2048'
        ]);

        $data = $request->only('topic_id', 'title', 'content');

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('blogs', 'public');
        }

        BlogPost::create($data);

        return redirect()->route('blog.posts.index')->with('success', 'Blog post created successfully.');
    }

    // Show edit form
    public function edit($id)
    {
        $post = BlogPost::findOrFail($id);
        $topics = BlogTopic::all();
        return view('admin.blog.edit', compact('post', 'topics'));
    }

    // Update blog post
    public function update(Request $request, $id)
    {
        $post = BlogPost::findOrFail($id);

        $request->validate([
            'topic_id' => 'required|exists:blog_topics,id',
            'title'    => 'required|string|max:255',
            'content'  => 'required',
            'image'    => 'nullable|image|max:2048'
        ]);

        $data = $request->only('topic_id', 'title', 'content');

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('blogs', 'public');
        }

        $post->update($data);

        return redirect()->route('blog.posts.index')->with('success', 'Blog post updated successfully.');
    }

    // Soft delete post
    public function destroy($id)
    {
        $post = BlogPost::findOrFail($id);
        $post->delete();
        return back()->with('success', 'Post moved to trash.');
    }

    // View trashed posts
    public function trash()
    {
        $posts = BlogPost::onlyTrashed()->with('topic')->paginate(5);
        return view('admin.blog.trash', compact('posts'));
    }

    // Restore post
    public function restore($id)
    {
        BlogPost::onlyTrashed()->findOrFail($id)->restore();
        return back()->with('success', 'Post restored successfully.');
    }

    // Permanently delete post
    public function forceDelete($id)
    {
        BlogPost::onlyTrashed()->findOrFail($id)->forceDelete();
        return back()->with('success', 'Post permanently deleted.');
    }
}
