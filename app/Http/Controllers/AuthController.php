<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //
    public function log(){
        return view('auth.log');
    }

    public function HandleLogin (AuthRequest $request){
        $credentials=($request->only(['email', 'password']));

        if (Auth::attempt($credentials)) {
            
            return redirect()->route('dashboard');
        }
        else
        {
             return redirect()->back()->with(
            'msg_error','Parametre de connexion erroné.');
        }
    }
}


