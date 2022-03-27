<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
   

    public function login(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'bail|required|email:rfc,dns|',
            'password' => 'required'
        ]);
        

        $email = $request->email;
        $password = $request->password;
        $user=User::where('Email' , $email)
              ->where( 'Password' , $password)
              ->first();       
       
            if($user) {
                $acesstoken=  $user->createToken('UserToken')->accessToken;
                return response()->json(['user'=>$user, 'accesstoken' => $acesstoken]);
            } else {
                return route('accessdenied');
            }
    }

   

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'bail|required|email:rfc,dns|unique:users,email',
            'name' => 'required|string',
            'password' => 'required'
        ]);
        

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password
        ]);

        return response(['message'=> 'registered']);
    }

    
    public function show(Request $request)
    {
        return  $request->user()->toJson();
    }


    public function updateName(Request $request)
    {
        $validatedData = $request->validate([            
            'name' => 'required|string',
        ]);

       $user = User::find($request->user()->id); 
       $user->name = $request->name;
       $user->save();
       return $user->toJson();
    }

    public function destroy($id)
    {
        //if there is a deactivate feature we set it to be true
        // or move the record to another table called deactivated users
        // or delete the record
    }
}
