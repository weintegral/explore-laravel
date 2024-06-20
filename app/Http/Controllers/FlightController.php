<?php

namespace App\Http\Controllers;

use App\Models\Flight;
use Illuminate\Http\Request;

class FlightController extends Controller
{
    public function index()
    {
        $flights = Flight::all()->toArray();
        return response()->json($flights, 200);
    }

    public function get($id) {
        $flights = Flight::where('id', $id)
            ->orderBy('name', 'desc')
            ->get()
            ->toArray();
        return response()->json($flights, 200);
    }

    public function create(Request $request) {
        $flight = new Flight();
        $flight->name = $request->name;
        $flight->airline = $request->airline;
        $flight->save();

        return response()->json([
            "message" => "Flight record created"
        ], 201);
    }

    public function update(Request $request, $id) {
        $flight = Flight::find($id);
        $flight->name = $request->name;
        $flight->airline = $request->airline;
        $flight->save();

        return response()->json([
            "message" => "Flight record updated"
        ], 200);
    }

    public function delete($id) {
        $flight = Flight::find($id);
        $flight->delete();

        return response()->json([
            "message" => "Flight record deleted"
        ], 200);
    }
}
