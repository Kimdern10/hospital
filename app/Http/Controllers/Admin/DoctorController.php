<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\Department;
use App\Models\Speciality;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    // List active doctors
    public function index()
    {
        $doctors = Doctor::with(['department', 'specialities'])->latest()->paginate(10);
        return view('admin.doctors.list', compact('doctors'));
    }

    // Show trashed doctors
    public function trashed()
    {
        $doctors = Doctor::onlyTrashed()->with(['department', 'specialities'])->latest()->paginate(10);
        return view('admin.doctors.trash', compact('doctors'));
    }

    // Show create doctor form
    public function create()
    {
        $departments = Department::all();
        $specialities = Speciality::all();
        return view('admin.doctors.create', compact('departments', 'specialities'));
    }

    // Store new doctor
    public function store(Request $request)
    {
        $request->validate([
            'name'           => 'required',
            'phone'          => 'nullable',
            'email'          => 'required|email|unique:doctors',
            'location'       => 'required',
            'department_id'  => 'required|exists:departments,id',
            'specialities'   => 'required|array',
            'specialities.*' => 'exists:specialities,id',
            'working_hours'  => 'required|array',
            'working_hours.*'=> 'nullable|string',
            'bio'            => 'nullable|string',
            'image'          => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->except('specialities');

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('doctors', 'public');
        }

        $data['working_hours'] = json_encode($request->working_hours);

        $doctor = Doctor::create($data);

        $doctor->specialities()->sync($request->specialities);

        return redirect()->route('index')->with('success', 'Doctor added successfully.');
    }

    // Show edit form
    public function edit($id)
    {
        $doctor = Doctor::with('specialities')->findOrFail($id);
        $departments = Department::all();
        $specialities = Speciality::all();

        $doctor->working_hours = json_decode($doctor->working_hours, true);

        return view('admin.doctors.edit', compact('doctor', 'departments', 'specialities'));
    }

    // Update doctor
    public function update(Request $request, $id)
    {
        $doctor = Doctor::findOrFail($id);

        $request->validate([
            'name'           => 'required',
            'phone'          => 'nullable',
            'email'          => 'required|email|unique:doctors,email,' . $doctor->id,
            'location'       => 'required',
            'department_id'  => 'required|exists:departments,id',
            'specialities'   => 'required|array',
            'specialities.*' => 'exists:specialities,id',
            'working_hours'  => 'required|array',
            'working_hours.*'=> 'nullable|string',
            'bio'            => 'nullable|string',
            'image'          => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->except('specialities');

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('doctors', 'public');
        }

        $data['working_hours'] = json_encode($request->working_hours);

        $doctor->update($data);

        $doctor->specialities()->sync($request->specialities);

        return redirect()->route('index')->with('success', 'Doctor updated successfully.');
    }

    // Soft delete doctor
    public function destroy($id)
    {
        $doctor = Doctor::findOrFail($id);
        $doctor->delete();
        return redirect()->route('index')->with('success', 'Doctor moved to trash.');
    }

    // Restore soft-deleted doctor
    public function restore($id)
    {
        $doctor = Doctor::onlyTrashed()->findOrFail($id);
        $doctor->restore();
        return redirect()->route('trashed')->with('success', 'Doctor restored successfully.');
    }

    // Permanently delete doctor
    public function forceDelete($id)
    {
        $doctor = Doctor::onlyTrashed()->findOrFail($id);
        $doctor->forceDelete();
        return redirect()->route('trashed')->with('success', 'Doctor permanently deleted.');
    }
}
