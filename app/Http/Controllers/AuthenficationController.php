<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthenficationRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthenficationController extends Controller
{
    public function login(AuthenficationRequest $request){
        //find cherche par id et where cherche ?
        $user = User::where('email', $request->email)->first();
        if(Hash::check($request->password,$user->password)){
            return response()->json([
            "token" => $user->createToken('password')->accessToken,
            "name"=>$user->name,
            "id_user"=>$user->id
            ]);
        }
        return response()->json([
            "message"=> "error in login"
        ], 401);
    }
    public function logout()
{
    
   $r = Auth::user()->token()->revoke();
   if($r){
    return response()->json([
        'message' => 'Successfully logged out'
    ],200);
   }
   return response()->json([
        "error"=> "error in login"
    ], 401);
    
}
}
