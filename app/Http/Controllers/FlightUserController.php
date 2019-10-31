<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Flight;

class FlightUserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //middleware user_id == auth user id 
    }

    /**
     * get user's flights
     *
     * @param User $user
     * @return Response
     */
    public function index($id)
    {
        
        try {
            
            $user = User::findOrFail($id);
    
            return response()->json(['data' => $user->flights], 200);

        } catch (\Exception $e) {

            return response()->json(['message' => 'user not found'], 404);

        }

    }

    /**
     * create user flight
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {

        try {

            $flight = Flight::findOrFail($request->flight_id);
            
            $user = User::findOrFail($request->user_id);

            $user->flights()->save($flight);

            return response()->json(['message' => 'user flight created'], 201);


        } catch (\Throwable $th) {

            return response()->json(['message' => 'flight or user not found'], 404); 

        }

    }

}