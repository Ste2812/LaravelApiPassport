<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;  //This is the user model / Models / Use
use Illuminate\Support\Str;

class UserController extends Controller
{
     /**
     * User CRUD section
     */
    public function user_create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username'=>'required|string|max:50',
            'name'=> 'required|string|max:50',
            'email'=> 'required|string|email|max:255|unique:users',
            'password'=> 'required|string|between:8,50|confirmed'
        ]);

        if ($validator->fails()) {
            return response(['errors'=>$validator->errors()->all()], 422);
        }

        $request['password']= Hash::make($request['password']);
        $request['remember_token'] = Str::random(10);


        $user= User::create($request->toArray());
        $token = $user->createToken('Laravel Password Grant Client')->accessToken;
        $user->username =$request->username;
        $user->name =$request->name;
        $user->email =$request->email;
        $user->password =$request->password;

        $user->save();
        $response ='Successfully creates user';
        return response($response, 200)->json([$user, $token]);
    }

    public function user_update(Request $request, $id)
    {
        $user = User::find($request->id);

        $validator = Validator::make($request->all(), [
            'username'=> 'required|string|max:50',
            'name'=> 'required|string|max:50',
            'email' => 'required|string|email|max:255|unique:users',
            'password'=> 'required|string|between:8,50|confirmed',

        ]);

        if ($validator->fails()) {
            return response(['errors'=>$validator->errors()->all()], 422);
        }

        $request['password'] = Hash::make($request['password']);
         $user->username= $request->username;
         $user->name = $request->name;
         $user->email = $request->email;
         $user->password = $request->password;

         $user->update();
         return $user;
    }

    public function user_delete(Request $request)
    {
        $user = User::find($request->id);
        $user->delete();

        $response = 'Succesfully user removed!';
        return response ($response, 200);
    }

    public function user_index()
    {
        return User::all();

    }

    public function login(Request $request)
    {

        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' =>['required']
        ]);

        $credentials =request(['email', 'password']);


        if (!Auth::attempt($credentials)) {
            return response()->json([
                'message'=> 'Unauthorized'], 401);
        }

        $user = $request->user();
        $accessToken = $user->createToken('authToken')->accessToken;

        return response(['user'=> Auth::user(), 'access_token'=>$accessToken]);
    }

    public function logout(Request $request)
    {
        $token =$request->user()->token();
        $token->revoke();

        $response = 'You have been successfully logged out';

        return response($response, 200);
    }

}
