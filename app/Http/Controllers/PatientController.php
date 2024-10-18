<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function index()
    {
        $patients = Patient::all();
        return response()->json($patients);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'admission_status' => 'required|string',
            'room_id' => 'nullable|exists:rooms,id',
            'service_id' => 'nullable|exists:services,id',
        ]);

        $patient = Patient::create($validated);
        return response()->json($patient, 201);
    }

    public function show($id)
    {
        $patient = Patient::find($id);
        if (!$patient) {
            return response()->json(['message' => 'Patient not found'], 404);
        }
        return response()->json($patient);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'string|max:255',
            'admission_status' => 'string',
            'room_id' => 'exists:rooms,id',
            'service_id' => 'exists:services,id',
        ]);

        $patient = Patient::find($id);
        if (!$patient) {
            return response()->json(['message' => 'Patient not found'], 404);
        }

        $patient->update($validated);
        return response()->json($patient);
    }

    public function discharge($id)
    {
        $patient = Patient::find($id);
        if (!$patient) {
            return response()->json(['message' => 'Patient not found'], 404);
        }

        $patient->admission_status = 'discharged';
        $patient->save();

        return response()->json(['message' => 'Patient discharged']);
    }

    public function destroy($id)
    {
        $patient = Patient::find($id);
        if (!$patient) {
            return response()->json(['message' => 'Patient not found'], 404);
        }

        $patient->delete();
        return response()->json(['message' => 'Patient deleted']);
    }
}
