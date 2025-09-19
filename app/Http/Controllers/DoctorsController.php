<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;

class DoctorsController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('search');

        $doctors = Doctor::with(['department', 'specialities'])
            ->where('name', 'LIKE', "%{$query}%") // doctor name
            ->orWhereHas('department', function ($q) use ($query) {
                $q->where('name', 'LIKE', "%{$query}%"); // department name
            })
            ->orWhereHas('specialities', function ($q) use ($query) {
                $q->where('name', 'LIKE', "%{$query}%"); // speciality name
            })
            ->get();

        // ✅ Pass both doctors and query to the view
        return view('search-results', [
            'doctors' => $doctors,
            'query' => $query,
        ]);
    }
}
