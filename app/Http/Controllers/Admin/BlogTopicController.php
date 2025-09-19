<?php 

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogTopic;
use Illuminate\Http\Request;

class BlogTopicController extends Controller
{
    // List all topics
    public function index()
    {
        $topics = BlogTopic::latest()->paginate(10);
        return view('admin.topics.list', compact('topics'));
    }

    // Show create topic form
    public function create()
    {
        return view('admin.topics.create');
    }

    // Store new topic
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:blog_topics,name',
        ]);

        BlogTopic::create($request->only('name'));

        return redirect()->route('admin.topics.index')
                         ->with('success', 'Topic added successfully.');
    }

    // Show edit form
    public function edit($id)
    {
        $topic = BlogTopic::findOrFail($id);
        return view('admin.topics.edit', compact('topic'));
    }

    // Update topic
    public function update(Request $request, $id)
    {
        $topic = BlogTopic::findOrFail($id);

        $request->validate([
            'name' => 'required|unique:blog_topics,name,' . $topic->id,
        ]);

        $topic->update($request->only('name'));

        return redirect()->route('admin.topics.index')
                         ->with('success', 'Topic updated successfully.');
    }

    // Soft delete
    public function destroy($id)
    {
        BlogTopic::findOrFail($id)->delete();
        return redirect()->route('admin.topics.index')
                         ->with('success', 'Topic moved to trash.');
    }

    // View trashed topics
    public function trash()
    {
        $topics = BlogTopic::onlyTrashed()->paginate(10);
        return view('admin.topics.trash', compact('topics'));
    }

    // Restore topic
    public function restore($id)
    {
        BlogTopic::onlyTrashed()->findOrFail($id)->restore();
        return redirect()->route('admin.topics.trash')
                         ->with('success', 'Topic restored successfully.');
    }

    // Permanently delete topic
    public function forceDelete($id)
    {
        BlogTopic::onlyTrashed()->findOrFail($id)->forceDelete();
        return redirect()->route('admin.topics.trash')
                         ->with('success', 'Topic permanently deleted.');
    }
}
