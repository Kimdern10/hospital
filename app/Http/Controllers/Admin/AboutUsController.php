<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutUs;
use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    public function index()
    {
        $aboutUs = AboutUs::latest()->paginate(10);
        return view('admin.about.index', compact('aboutUs'));
    }

    public function trashed()
    {
        $aboutUs = AboutUs::onlyTrashed()->latest()->paginate(10);
        return view('admin.about.trash', compact('aboutUs'));
    }

    public function create()
    {
        return view('admin.about.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string',
            'content' => 'required|string',
            'mission' => 'nullable|string',
            'vision' => 'nullable|string',
            'idea' => 'nullable|string',
            'opening_hours' => 'required|array', // ✅ must be array
            'opening_hours.*' => 'required|string', // each day is string
        ]);

        AboutUs::create($data);
        return redirect()->route('about.index')->with('success', 'About Us created successfully');
    }

    public function edit($id)
    {
        $about = AboutUs::findOrFail($id);
        return view('admin.about.edit', compact('about'));
    }

    public function update(Request $request, $id)
    {
        $about = AboutUs::findOrFail($id);

        $data = $request->validate([
            'title' => 'required|string',
            'content' => 'required|string',
            'mission' => 'nullable|string',
            'vision' => 'nullable|string',
            'idea' => 'nullable|string',
            'opening_hours' => 'required|array', // ✅ must be array
            'opening_hours.*' => 'required|string',
        ]);

        $about->update($data);
        return redirect()->route('about.index')->with('success', 'About Us updated successfully');
    }

    public function destroy($id)
    {
        AboutUs::findOrFail($id)->delete();
        return redirect()->route('about.index')->with('success', 'Moved to trash');
    }

    public function restore($id)
    {
        AboutUs::onlyTrashed()->findOrFail($id)->restore();
        return redirect()->route('about.trashed')->with('success', 'Restored successfully');
    }

    public function forceDelete($id)
    {
        AboutUs::onlyTrashed()->findOrFail($id)->forceDelete();
        return redirect()->route('about.trashed')->with('success', 'Permanently deleted');
    }
}
