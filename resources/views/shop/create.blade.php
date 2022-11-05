@extends('layouts.main')

@section('header','- Shop - Create')

@section('content')

<div class="content">
    <form action="{{ route('shop-create-add') }}" method="post">
      @csrf  
      <center>
        <table>
            <tr>
                <td><strong>Code</strong></td>
                <td>::</td>
                <td><input type="text" name="code" required/></td>
                
                
            </tr>
            <tr>
            <td><strong>Name</strong></td>
                <td>::</td>
                <td><input type="text" name="name" required/></td>
            </tr>
            <tr>
            <td><strong>Address</strong></td>
                <td>::</td>
                <td><input type="text" name="address" required/></td>
            </tr>
            <tr>
            <td><strong>Phone Number</strong></td>
                <td>::</td>
                <td><input type="number" name="phone" required/></td>
            </tr>
            <tr>
            <td><strong>Link Facebook</strong></td>
                <td>::</td>
                <td><input type="text" name="fblink" required/></td>
            </tr>
            <tr>
                <td><strong>Description</strong></td>
                <td>::</td>
                <td><textarea name="description" required></textarea></td>
                
            </tr>
            <tr>
                <td colspan="3"><input type="submit" value="Submit"></td>
            </tr>
        </table>
      </center>
    </form>
</div>
    
@endsection