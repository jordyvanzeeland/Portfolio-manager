<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use JWTAuth;

class UsersController extends BaseController
{
   public function authenticate(Request $request){
    $credentials = $request->only('username', 'password');

    try{
        if(!$token = JWTAuth::attempt($credentials)){
            return response()->json(['error' => 'invalid credentials'], 400);
        }
    }catch(JWTException $e){
        return response()->json(['error' => 'could not create token'], 500);
    }

    return response()->json(compact('token'));
   }

   public function getAuthenticatedUser(){
    try{
        if(!$user = JWTAuth::parseToken()->authenticate()){
            return response()->json(['error' => 'user not found'], 404);
        }
    }catch(Tymon\JWTAuth\Exceptions\TokenExpiredException $e){
        return response()->json(['token expired'], $e->getStatusCode());
    }catch(Tymon\JWTAuth\Exceptions\TokenInvalidException $e){
        return response()->json(['token invalid'], $e->getStatusCode());
    }catch(Tymon\JWTAuth\Exceptions\JWTException $e){
        return response()->json(['token absent'], $e->getStatusCode());
    }

    return response()->json(compact('user'));
   }
}