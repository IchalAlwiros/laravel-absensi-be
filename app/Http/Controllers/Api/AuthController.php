<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // login

    public function login (Request $request){
        $loginData = $request->validate([
            'email'=> 'required|email',
            'password' => 'required'
        ]);

        $user = User::where('email', $loginData['email'])-> first();

        // check user exist
        if (!$user) {
            // return response(['success' => false,'message' => 'Invalid credentials'], 401);

            return ResponseHelper::sendErrorResponse('Invalid credentials', [], Response::HTTP_UNAUTHORIZED);
        }

        //check password
        if (!Hash::check($loginData['password'], $user->password)) {
            // return response(['success' => false, 'message' => 'Invalid credentials'], 401);
            return ResponseHelper::sendErrorResponse('Invalid credentials', [], Response::HTTP_UNAUTHORIZED);
        }

        $token = $user->createToken('auth_token')->plainTextToken;

        // return response(['success' => true, 'user' => $user, 'token' => $token], 200);
        return ResponseHelper::sendSuccessResponse('User authenticated successfully', ['profile' => $user, 'token' => $token]);
    }


    // logout
    public function logout(Request $request) {
        $request->user()->currentAccessToken()->delete();

        return response(['success' => true, 'message' => 'Logged out'], 200);
    }
}
