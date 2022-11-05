<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Psr\Http\Message\ServerRequestInterface;

class SignupController extends Controller
{
    function view()
    {
    return view('signup.view');
        
    }

    function createAdd (ServerRequestInterface $request){
        $data = $request->getParsedBody();

        User::create ([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'role' => $data['role'],
        ]);

        return redirect()->route('login')
        ->with('status', "{$data['email']} , your account was signed up.");
        
    }
}
