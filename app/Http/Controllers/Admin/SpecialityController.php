<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Speciality;
use Illuminate\Http\Request;

class SpecialityController extends Controller
{
    // List all specialities including active only
    public function index()
    {
        $specialities = Speciality::latest()->paginate(10);
        return view('admin.specialities.list', compact('specialities'));
    }

    // Show create form
    public function create()
    {
        return view('admin.specialities.create');
    }

    // Store new speciality
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:specialities,name',
        ]);

        Speciality::create(['name' => $request->name]);

        return redirect()->route('admin.specialities.index')->with('success', 'Speciality added successfully!');
    }

    // Show edit form
    public function edit(Speciality $speciality)
    {
        return view('admin.specialities.edit', compact('speciality'));
    }

    // Update speciality
    public function update(Request $request, Speciality $speciality)
    {
        $request->validate([
            'name' => 'required|unique:specialities,name,' . $speciality->id,
        ]);

        $speciality->update(['name' => $request->name]);

        return redirect()->route('admin.specialities.index')->with('success', 'Speciality updated successfully!');
    }

    // Soft delete (move to trash)
    public function destroy(Speciality $speciality)
    {
        $speciality->delete();
        return redirect()->route('admin.specialities.index')->with('success', 'Speciality moved to trash!');
    }

    // Trash list (soft deleted items)
    public function trash()
    {
        $specialities = Speciality::onlyTrashed()->latest()->paginate(10);;
        return view('admin.specialities.trash', compact('specialities'));
    }

    // Restore trashed speciality
    public function restore($id)
    {
        $speciality = Speciality::onlyTrashed()->findOrFail($id);
        $speciality->restore();

        return redirect()->route('admin.specialities.index')->with('success', 'Speciality restored successfully!');
    }

    // Permanently delete speciality
    public function forceDelete($id)
    {
        $speciality = Speciality::onlyTrashed()->findOrFail($id);
        $speciality->forceDelete();

        return redirect()->route('admin.specialities.index')->with('success', 'Speciality permanently deleted!');
    }
}
