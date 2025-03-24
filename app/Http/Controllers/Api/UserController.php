<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


use App\Http\Controllers\BaseController;

use App\Models\User;

class UserController extends BaseController
{
    //
    function register(){
        User::create([
            'name' => request('name'),
            'email' => request('email'),
            'password' => Hash::make(request('password')),
        ]);
        return response(['message' => 'User created successfully'], 201);
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


