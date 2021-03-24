<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Validation\Validator;
use Tymon\JWTAuth\Exceptions\TokenBlacklistedException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;

class JwtController extends Controller
{
    public function login(Request $request) {

        $credentials = $request->all();
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required'
        ])->validate();

        if($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors(),
            ], 422);
        }

        if( $token = JWTAuth::attempt($request->all()) ) {
            return response()->json([
                'success' => true,
                'token' => $token,
                'user' => User::where('email', $credentials['email'])->get()->first()
            ],200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Login Error',
            ],401);

        }
    }

    public function refreshToken() {
        $token = JWTAuth::getToken();

        try {
            $token = JWTAuth::refresh();
            return response()->json([
                'success' => true,
                'token' => $token ], 200);

        } catch (TokenExpiredException $exp) {
            return response()->json([
                'success' => false,
                'status' => 'Expired',
                'message' => 'No se pudo refrescar el token.'
            ], 500);
            
        } catch (TokenBlacklistedException $ex) {
            return response()->json([
                'success' => false,
                'status' => 'Blacklisted',
                'message' => 'No se pudo refrescar el token.'
            ], 500);
        }
    }
}
