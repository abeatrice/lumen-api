<?php

namespace App\Http\Controllers;

use App\Flight;
use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Request;

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
    public function index(Request $request)
    {
        $page = $request->has('page') ? $request->get('page') : 1;

        $flights = Cache::remember("flights_page_{$page}", 3600, function () {
            return Flight::paginate();
        });

        return response()->json(['data' => $flights], 200);
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
