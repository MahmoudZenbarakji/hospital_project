<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function index()
    {
        $doctors = Doctor::all();
        return response()->json($doctors);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'specialty' => 'required|string|max:255',
        ]);

        $doctor = Doctor::create($validated);
        return response()->json($doctor, 201);
    }

    public function show($id)
    {
        $doctor = Doctor::find($id);
        if (!$doctor) {
            return response()->json(['message' => 'Doctor not found'], 404);
        }
        return response()->json($doctor);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'string|max:255',
            'specialty' => 'string|max:255',
        ]);

        $doctor = Doctor::find($id);
        if (!$doctor) {
            return response()->json(['message' => 'Doctor not found'], 404);
        }

        $doctor->update($validated);
        return response()->json($doctor);
    }

    public function destroy($id)
    {
        $doctor = Doctor::find($id);
        if (!$doctor) {
            return response()->json(['message' => 'Doctor not found'], 404);
        }

        $doctor->delete();
        return response()->json(['message' => 'Doctor deleted']);
    }

    public function addShift(Request $request, $id)
    {
        // Logic for adding a shift to the doctor's schedule
        return response()->json(['message' => 'Shift added']);
    }

    public function scheduleSurgery(Request $request, $id)
    {
        // Logic for scheduling a surgery for a doctor
        return response()->json(['message' => 'Surgery scheduled']);
    }
}
