<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class RegisterUserController extends Controller
{

    /**
     * Register a new user
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed',
        ]);

        try {

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => app('hash')->make($request->password)
            ]);

            return response()->json(['user' => $user, 'message' => 'User Registered'], 201);

        } catch (\Exception $e) {

            return response()->json(['message' => 'User Registration Failed'], 409);
            
        }
    }

}
