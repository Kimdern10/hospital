<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    // Store appointment from frontend form
    public function store(Request $request)
    {
        $request->validate([
            'name'          => 'required|string|max:255',
            'mobile'        => 'required|string|max:20',
            'date'          => 'required|date',
            'doctor_id'     => 'required|exists:doctors,id',
            'department_id' => 'required|exists:departments,id',
        ]);

        Appointment::create($request->all());

        return back()->with('success', 'Appointment submitted successfully.');
    }

  
}
