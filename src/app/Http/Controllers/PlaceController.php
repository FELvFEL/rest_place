<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Place;
use Illuminate\Support\Facades\Validator;

class PlaceController extends Controller
{
    public function index()
    {
        $places = Place::all();
        return response()->json($places);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'unique:places,name'],
            'latitude' => ['required', 'numeric'],
            'longitude' => ['required', 'numeric']
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        try {
            $validatedData = $validator->validated();
            $place = Place::query()->create($validatedData);
            return response()->json($place,201);
        } catch (\Exception $e) {
            return response()->json(['status' => 'failed', 'message' => 'Internal server error', 'error' => $e->getMessage()], 500);
        }
    }
}
