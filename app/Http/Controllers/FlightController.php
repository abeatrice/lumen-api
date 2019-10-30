<?php

namespace App\Http\Controllers;

use App\Flight;

class FlightController extends Controller
{
    /**
     * Get all flights
     *
     * @return Response
     */
    public function index()
    {
        $flights = Flight::all();

        return $flights;
    }

    public function show($flight)
    {
        return [
            'id' => $flight,
            'to' => 'lax',
            'from' => 'bur'
        ];
    }
}
