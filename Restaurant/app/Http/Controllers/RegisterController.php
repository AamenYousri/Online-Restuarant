<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;



class RegisterController extends Controller
{
    public function register(request $request){
       

            $validator = Validator::make($request->all(),[
                'name'=>'required|max:191|string',
                'email'=>'required|max:191|unique:apis|string',
                'password'=>'required|max:191|string'

            ]);

            if($validator->fails()){
                return $validator->errors();
            }else{

                    $data = User::create([
                        'name'=>$request->name,
                        'email'=>$request->email,
                        'password'=>Hash::make($request->password),
                        'api_token'=>Str::random(60),
                    ]);

                    return $data;
            }

    }



    public function index(request $request){

        if(auth()->attempt(['email'=>$request->input('email'),
            'password'=>$request->input('password')
        ])){

            $user = auth()->user();
            $user->api_token = Str::random(60);

            $user->save();
            return $user;

        }else{
            return 'no';
        }

    }



    public function logout(){

        if(auth()->user()){
            $user = auth()->user();
            $user->api_token = null;
            $user->save();

            return response()->json(['message'=>'Thank you']);
        }

        return response()->json([
            'error'=>'Unable to logout user',
            'code'=>401
        ], 401);
    }

}