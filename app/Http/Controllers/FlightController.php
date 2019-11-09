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
        $key = "flights";
        $key .= "_page_{$request->page}";
        $key .= "_departsAfter_{$request->departsAfter}";
        $key .= "_departsBefore_{$request->departsBefore}";
        $key .= "_origin_{$request->origin}";
        $key .= "_destination_{$request->destination}";

        $flights = Cache::remember($key, 300, function () use($request) {
            
            $query = Flight::orderBy('departs');

            if($request->has('departsAfter')) {
                $query->where('departs', '>', $request->get('departsAfter'));
            }

            if($request->has('departsBefore')) {
                $query->where('departs', '<', $request->get('departsBefore'));
            }

            if($request->has('origin')) {
                $query->where('origin', $request->get('origin'));
            }

            if($request->has('destination')) {
                $query->where('destination', $request->get('destination'));
            }

            return $query->paginate();

        });

        return response()->json(['data' => $flights], 200);
    }

    /**
     * get single flight
     *
     * @param String $flight
     * @return Response
     */
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
