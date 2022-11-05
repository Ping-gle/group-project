@extends('layouts.main')

@section('header','- Sign In')

@section('content')
    <div class="signinform">
            <p>Please Sign In to your account.</p>

            <div class="info">
            @error('credentials')
            <div class="warn">{{ $message}}</div>
            @enderror
            </div>

           
            
            <form action="{{ route('authenticate') }}" method="post">
            @csrf
            <center>
                <table>
                    <tr>
                        <td>Email</td>
                        <td>::</td>
                        <td><input type="text" name="email" required/></td>
                        
                    </tr>
                    <tr>
                        <td>Password</td>
                        <td>::</td>
                        <td><input type="number" name="password" required/></td>
                        
                    </tr>
                </table>
            </center>
                <input type="submit" value="Sign In">
            </form>
            
            
            <p>Are you a member yet ? if you're not please<a href="/signup"> Sign Up</a></p>
            
        </div>
    @endsection
    
    
   