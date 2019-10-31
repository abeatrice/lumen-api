<?php

namespace App\Http\Controllers;

use App\Flight;

class FlightController extends Controller
{

    /**
     * Create Controller
     * 
     * @return void
     */
    public function __construct() 
    {
        $this->middleware('auth');
    }

    /**
     * Get all flights
     *
     * @return Response
     */
    public function index()
    {
        return response()->json(['data' => Flight::all()], 200);
    }

    public function show($flight)
    {
        try {

            $flight = Flight::findOrFail($flight);

            return response()->json(['data' => $flight], 200);

        } catch (\Exception $e) {

            return response()->json(['message' => 'flight not found'], 404);

        }

    }
}
