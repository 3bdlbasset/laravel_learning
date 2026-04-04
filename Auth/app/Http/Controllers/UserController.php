<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function Register(Request $request){
        $request->validate([
            'name'=>'required|string|max:255',
            'email'=>'required|string|email|unique:users,email',
            'password'=>'required|string|min:8|'
        ]);

        $user = User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'age'=>$request->age,
            'role'=>$request->role,
            'password'=>Hash::make($request->password),
        ]);

        return response()->json([
            'message'=>'User Registered Successfully',
            'user'=>$user

        ] , 200);
    } 

    public function Login(Request $request){
        $request->validate([
            'email'=>'required|string|email',
            'password'=>'required|string'
        ]);

        if(!Auth::attempt([
            'email'=>$request->email,
            'password'=>$request->password,
        ])){
            return response()->json(['error' => 'invalid credentials'],401 );
        };

        $user = User::where('email',$request->email)->firstOrFail();
        $token = $user->createToken('AUTH_token')->plainTextToken;

        return response()->json([
            'user'=>$user->toResource(),
            'token'=>$token,
        ]);
    }

    public function Logout(Request $request){
        if($request->user()){
            $request->user()->currentAccessToken()->delete();
            return response()->json([
                "message"=>"LogedOut Successfully"
            ] , 200);
        };

        return response()->json([
            "message"=>"Not authanticated"
        ] , 401);
    }

    public function show(User $user){
        return new UserResource($user) ;
    }

    public function getAllUsers(){
        return User::all()->toResourceCollection();
    }

    public function update(Request $request , $id){
        $user = User::findOrFail($id);
        $user->update($request->all());
        return response()->json([
            $user
        ]);
    }
}
