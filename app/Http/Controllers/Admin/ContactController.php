<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::latest()->paginate(10);
        return view('admin.contacts.list', compact('contacts'));
    }

    public function create()
    {
        return view('admin.contacts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'address' => 'required|string|max:255',
            'address_two' => 'nullable|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'phone_two' => 'nullable|string|max:20',
            'working_days' => 'required|string|max:255',
            'weekend_days' => 'required|string|max:255',
        ]);

        Contact::create($request->all());

        return redirect()->route('contacts.index')->with('success', 'Contact added successfully.');
    }

    public function edit($id)
    {
        $contact = Contact::findOrFail($id);
        return view('admin.contacts.edit', compact('contact'));
    }

    public function update(Request $request, $id)
    {
        $contact = Contact::findOrFail($id);

        $request->validate([
            'address' => 'required|string|max:255',
            'address_two' => 'nullable|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'phone_two' => 'nullable|string|max:20',
            'working_days' => 'required|string|max:255',
            'weekend_days' => 'required|string|max:255',
        ]);

        $contact->update($request->all());
        return redirect()->route('contacts.index')->with('success', 'Contact updated successfully.');
    }

    public function destroy($id)
    {
        Contact::findOrFail($id)->delete();
        return redirect()->route('contacts.index')->with('success', 'Contact moved to trash.');
    }

    public function trash()
    {
        $contacts = Contact::onlyTrashed()->latest()->paginate(10);
        return view('admin.contacts.trash', compact('contacts'));
    }

    public function restore($id)
    {
        Contact::withTrashed()->findOrFail($id)->restore();
        return redirect()->route('contacts.trash')->with('success', 'Contact restored successfully.');
    }

    public function forceDelete($id)
    {
        Contact::withTrashed()->findOrFail($id)->forceDelete();
        return redirect()->route('contacts.trash')->with('success', 'Contact permanently deleted.');
    }
}
