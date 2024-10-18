<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function index()
    {
        $rooms = Room::all();
        return response()->json($rooms);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'status' => 'required|string',
            'department_id' => 'required|exists:departments,id',
        ]);

        $room = Room::create($validated);
        return response()->json($room, 201);
    }

    public function show($id)
    {
        $room = Room::find($id);
        if (!$room) {
            return response()->json(['message' => 'Room not found'], 404);
        }
        return response()->json($room);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'status' => 'string',
            'department_id' => 'exists:departments,id',
        ]);

        $room = Room::find($id);
        if (!$room) {
            return response()->json(['message' => 'Room not found'], 404);
        }

        $room->update($validated);
        return response()->json($room);
    }

    public function destroy($id)
    {
        $room = Room::find($id);
        if (!$room) {
            return response()->json(['message' => 'Room not found'], 404);
        }

        $room->delete();
        return response()->json(['message' => 'Room deleted']);
    }

    public function assignPatient(Request $request, $id)
    {
        $room = Room::find($id);
        if (!$room || $room->status != 'vacant') {
            return response()->json(['message' => 'Room not available'], 400);
        }

        $room->status = 'occupied';
        $room->save();

        return response()->json(['message' => 'Patient assigned to room']);
    }

    public function vacate($id)
    {
        $room = Room::find($id);
        if (!$room || $room->status != 'occupied') {
            return response()->json(['message' => 'Room is not occupied'], 400);
        }

        $room->status = 'vacant';
        $room->save();

        return response()->json(['message' => 'Room is now vacant']);
    }

    public function availableRooms()
    {
        $availableRooms = Room::where('status', 'vacant')->get();
        return response()->json($availableRooms);
    }
}
