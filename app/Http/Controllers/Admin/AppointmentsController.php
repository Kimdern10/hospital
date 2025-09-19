<?php

namespace App\Http\Controllers\Admin;

use App\Models\Appointment;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AppointmentsController extends Controller
{
    //
      // Show in Admin dashboard
    public function index()
    {
        $appointments = Appointment::with(['doctor', 'department'])->latest()->paginate(10);
        return view('admin.appointments.index', compact('appointments'));
    }
}
