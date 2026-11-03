<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request) {
  
        $request->validate([
            'name' => 'required|min:3|max:100',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:3|max:15',
            'password_confirmation' => 'required|same:password',
        ]);
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role_id = 5;
        $user->password = Hash::make($request->password);
        if ($user->save()) {
           
            return response()->json(
                [
                    'success' => 'Registration Completed successfully',
                ]
            );
        } else {
            return response()->json(
                [
                    'error' => 'Registration Failed, try again',
                ],500
            );
        }
    }
       
    
    public function login(Request $request) {

      $request->validate([
           
            'email' => 'required|email',
            'password' => 'required',
            
        ]);

       $result = Auth::attempt([
            'email' => $request->email,
            'password' => $request->password,]);

            if($result){
                $user = Auth::user();
                $token = $user->createToken('myapptoken')->plainTextToken;
                return response()->json([
                    'success' => 'true',
                    'token' => $token,
                    'user' => $user,]);
            }else{
                return response()->json([
                    'error' => 'true',
                    'message' => 'User not found',
                ],401);
            }
        
    }

    public function logout(Request $request){ {
           //single token logout
        //    $request->user()->currentAccessToken()->delete();

  //all token logout
           $request->user()->tokens()->delete();


           return response()->json("logout Worked");
       }
    }
    public function checkToken(Request $request){
        // return 'Token Worked';
        $result = Auth::guard('sanctum')->check();
        if(!$result){
            return response()->json([
                'success' => 'true',
                'token' => 'invalid token', 
                ],401);
        }else{
            $user = Auth::guard('sanctum')->user();
            
            return response()->json([
                'success' => 'true',
                
                'user' => $user,]);
        }
        return response()->json($result);
        
        // return response()->json('Token Worked');
    }
}

