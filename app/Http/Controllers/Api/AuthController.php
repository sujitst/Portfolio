<?php
namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;


class AuthController extends Controller
{
    // ================= REGISTER =================
    public function register(Request $request) {
        try {
            $validator = Validator::make($request->all(), [
                'name'     => 'required|string|max:255',
                'email'    => 'required|email|unique:users,email',
                'password' => 'required|min:8|confirmed', 
            ]);

            if($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Validation Failed',
                    'errors'  => $validator->errors(),
                ], 422);
            };

            $user = User::create([
                'name'     => $request->name,
                'email'    => $request->email,
                'password' => Hash::make($request->password),
            ]);

            $token = $user->createToken('auth_token')->plainTextToken;

            return response()->json([
                'success' => true,
                'message' => 'User Registered Successfully',
                'token_type'    => 'Bearer',
                'token' => $token
            ], 201);

        }catch (\Exception $e) {
            return response()->json([
                'message' => 'Register Failed',
                'error' => $e->getMessage(),
            ], 500);
        }
    }



    // ================= LOGIN =================
    public function login(Request $request) {
        try {
            $validator = Validator::make($request->all(), [
                'email' => 'required|email|string',
                'password' => 'required|string',
            ]);

            if($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Validation Failed.',
                    'error' => $validator->errors(),
                ], 422);
            }

            if (!auth()->attempt($request->only('email', 'password'))) {
                return response()->json([
                    'success' => false,
                    'message' => 'Invalid Credentials',
                ], 401);
            }

            $user = auth()->user();
            $token = $user->createToken('auth_token')->plainTextToken;

            return response()->json([
                'success'       => true,
                'message'       => 'Login Successful',
                'token_type'    => 'Bearer',
                'token'         => $token
            ], 200);

        }catch (\Exception $e) {
            return response()->json([
                'message' => 'Register Failed',
                'error' => $e->getMessage(),
            ], 500);
        }
    }



    // ================= LOGOUT =================
    public function logout(Request $request) {
        try {
            auth()->user()->currentAccessToken()->delete();
            return response()->json([
                'message' => 'Logout Sucessfully.',
            ], 200);
        }catch (\Exception $e) {
            return response()->json([
                'message' => 'Register Failed',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
