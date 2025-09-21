<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function Laravel\Prompts\password;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function register(Request $request){
        $validated = $request->validate([
            'name'=>['required','string'],
            'email'=>['required','email','unique:user,id'],
            'password'=>['required','confirmed']
        ]);
        $user = User::create([
            'name'=>$validated['name'],
            'email'=>$validated['email'],
            'password'=>$validated['password']
        ]);
        
        $token = $user->createToken('apiToken')->plainTextToken;

        return response()->json([
            'massage'=>'register succeseed',
            'user'=>$user,
            'token'=>$token
            
        ]);

        
    }


    public function login(Request $request){
        $validated = $request->validate([
            'email'=>['required','email'],
            'password'=>['required']
            
        ]);
        if(!Auth::attempt($validated))
            throw ValidationException::withMessages([
                'email' => ['Invalid data.'],
            ]);
            
            $user = auth()->user();
            $token = $user->createToken('apiToken')->plainTextToken;

            return response()->json([
            'massage'=>'login succeseed',
            'user'=>$user,
            'token'=>$token
            
        ]);
        
    }

    public function logout(Request $request) {
        $request->user()->currentAccessToken()->delete();
        return response()->json([
            'massage'=>'logout succeseed',
        
        ]);

        
    }






    
    
    


    



    

    
    
}