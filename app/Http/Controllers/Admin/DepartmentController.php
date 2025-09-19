<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DepartmentController extends Controller
{
    // List all departments (active + trashed info)
    public function index()
    {
        $departments = Department::latest()->paginate(10);
        return view('admin.departments.list', compact('departments'));
    }

    // Show trashed departments only
    public function trash()
    {
        $departments = Department::onlyTrashed()->latest()->paginate(10);
        return view('admin.departments.trash', compact('departments'));
    }

    // Show create form
    public function create()
    {
        return view('admin.departments.create');
    }

    // Store new department
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:departments,name',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $data = $request->only('name', 'description');

        // Handle image upload
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('departments', 'public');
        }

        Department::create($data);

        return redirect()->route('departments.index')->with('success', 'Department added successfully');
    }

    // Show edit form
    public function edit($id)
    {
        $department = Department::findOrFail($id);
        return view('admin.departments.edit', compact('department'));
    }

    // Update department
    public function update(Request $request, $id)
    {
        $department = Department::findOrFail($id);

        $request->validate([
            'name' => 'required|unique:departments,name,' . $department->id,
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $data = $request->only('name', 'description');

        // Handle image update
        if ($request->hasFile('image')) {
            if ($department->image && Storage::disk('public')->exists($department->image)) {
                Storage::disk('public')->delete($department->image);
            }
            $data['image'] = $request->file('image')->store('departments', 'public');
        }

        $department->update($data);

        return redirect()->route('departments.index')->with('success', 'Department updated successfully');
    }

    // Soft delete (move to trash)
    public function destroy($id)
    {
        Department::findOrFail($id)->delete();
        return redirect()->route('departments.index')->with('success', 'Department moved to trash');
    }

    // Restore trashed department
    public function restore($id)
    {
        Department::withTrashed()->findOrFail($id)->restore();
        return redirect()->route('departments.trash')->with('success', 'Department restored successfully');
    }

    // Permanently delete department
    public function forceDelete($id)
    {
        $department = Department::withTrashed()->findOrFail($id);

        if ($department->image && Storage::disk('public')->exists($department->image)) {
            Storage::disk('public')->delete($department->image);
        }

        $department->forceDelete();

        return redirect()->route('departments.trash')->with('success', 'Department permanently deleted');
    }
}
