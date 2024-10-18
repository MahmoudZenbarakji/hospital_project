<?php

namespace App\Http\Controllers;

use App\Models\SurgicalOperation;
use Illuminate\Http\Request;

class SurgicalOperationController extends Controller
{
    public function index()
    {
        return SurgicalOperation::all();
    }

    public function store(Request $request)
    {
        $operation = SurgicalOperation::create($request->all());
        return response()->json($operation, 201);
    }

    public function show($id)
    {
        return SurgicalOperation::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $operation = SurgicalOperation::findOrFail($id);
        $operation->update($request->all());
        return response()->json($operation, 200);
    }

    public function destroy($id)
    {
        SurgicalOperation::destroy($id);
        return response()->json(null, 204);
    }
}
