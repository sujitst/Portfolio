<?php
namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;


class UserController extends Controller
{
    public function profile() {
        try{
            return response()->json(auth()->user());
        } catch(\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to retrived user',
                'error' => $e->getMessage(),
            ]. 500);
        }
    }
}
