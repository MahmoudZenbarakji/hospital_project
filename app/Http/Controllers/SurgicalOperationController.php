<?php

namespace App\Http\Controllers;

use App\Models\Surgery;
use Illuminate\Http\Request;

class SurgeryController extends Controller
{
    // List all surgeries
    public function index()
    {
        $surgeries = Surgery::all();
        return response()->json($surgeries);
    }

    // Schedule a new surgery
    public function store(Request $request)
    {
        $validated = $request->validate([
            'operation_name' => 'required|string|max:255',
            'doctor_id' => 'required|exists:doctors,id',
            'scheduled_time' => 'required|date',
        ]);

        $surgery = Surgery::create($validated);
        return response()->json($surgery, 201);
    }

    // Get details of a specific surgery
    public function show($id)
    {
        $surgery = Surgery::find($id);
        if (!$surgery) {
            return response()->json(['message' => 'Surgery not found'], 404);
        }
        return response()->json($surgery);
    }

    // Update surgery details
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'operation_name' => 'string|max:255',
            'doctor_id' => 'exists:doctors,id',
            'scheduled_time' => 'date',
        ]);

        $surgery = Surgery::find($id);
        if (!$surgery) {
            return response()->json(['message' => 'Surgery not found'], 404);
        }

        $surgery->update($validated);
        return response()->json($surgery);
    }

    // Cancel a surgery
    public function destroy($id)
    {
        $surgery = Surgery::find($id);
        if (!$surgery) {
            return response()->json(['message' => 'Surgery not found'], 404);
        }

        $surgery->delete();
        return response()->json(['message' => 'Surgery canceled']);
    }
}
