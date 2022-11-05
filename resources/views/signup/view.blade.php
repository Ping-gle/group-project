@extends('layouts.main')

@section('header','- Sign Up')

@section('content')

<div class="signupform">
    <p>Registration System</p>
        <form action="{{ route('signup-create-add') }}" method="post">
        @csrf 
            <table>
                <tr>
                <td>Name</td>
                    <td>::</td>
                    <td><input type="text" name="name" required/></td>
                </tr>
                    <td>Email</td>
                    <td>::</td>
                    <td><input type="text" name="email" required/></td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td>::</td>
                    <td><input type="number" name="password" required/></td>
                </tr>
                <tr>
                    <td>Role (Who are you?)</td>
                    <td>::</td>
                    <td>
                        <select name="role" style=" width:170px; text-align:center;">
                            <option value="ADMIN">Admin</option>
                            <option value="USER">User</option>
                        </select>
                    </td>
                </tr>
            </table>
            <br>
            <input type="submit" value="Register">
        </form>
</div>


@endsection