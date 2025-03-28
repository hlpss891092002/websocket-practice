<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\BaseController;
use Illuminate\Support\Facades\Log;
use App\Models\User;
use Illuminate\Database\QueryException;

class UserController extends BaseController
{
    //
    function register(UserRequest $request){
        try{
            Log::info($request->all());
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
            return response(['msg' => 'User created successfully'], 201);
        }catch(\Exception $e){
            Log::error($e);
            return response(['msg' => 'User creation failed'], 500);
        }catch(QueryException $e){
            Log::error($e);
            return response(['msg' => 'Server error'], 500);
        }
        
    }

    function getUser($userData){
        $user = User::query();
        if (is_numeric($userData)){
            $user = $user->find($userData);
        };
        if (is_string($userData)){
            $user = $user->where('email', $userData);
        };
        $user->first();
        return response(['data' => $user], 200);
    }

    function updateUser($userData, Request $request ){
        $user = User::query();
        $updateData = $request->all();
        if (is_numeric($userData)){
            $user = $user->find($userData);
        };
        if (is_string($userData)){
            $user = $user->where('email', $userData);
        };
        $user->first();
        $user->update($updateData);
        return response(['data' => $user],200);
    }

    function getUsers(){
        $users = User::all();
        return response(['data' => $users]);
    }

}


