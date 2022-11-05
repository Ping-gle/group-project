<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Psr\Http\Message\ServerRequestInterface;

class SigninController extends Controller
{
    function view(){
        return view('signin.view');
    }

    function logout() 
    {
        Auth::logout();
        session()->invalidate();
        session()->regenerateToken();
        
        return redirect()->route('login');
    }

    function authenticate(ServerRequestInterface $request) 
    {   
     
        $data= $request->getParsedBody();
        $userEmail= [
            'email' => $data['email'],
            'password' => $data['password'],
        ];

        if(auth()->attempt($userEmail)) 
        {
            session()->regenerate();

            return redirect()->intended(route('home'));
        }

        return redirect()->back()->withErrors([
            'userEmail' => 'Email and Password is wrong.',
        ]);
    
    }
}
