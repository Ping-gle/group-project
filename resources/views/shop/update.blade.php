@extends('layouts.main')

@section('header','- Shop Update')

@section('content')

<div class="content">
    <form action="{{ route('shop-update-add',['code' => $shop['code']])}}" method="post">
      @csrf  
      <center>
        <table>
            <tr>
                <td><strong>Code</strong></td>
                <td>::</td>
                <td><input type="text" name="code" required value="{{ old('code', $shop->code) }}"></td>
            </tr>
            <tr>
                <td><strong>Name ::</strong></td>
                <td>::</td>
                <td><input type="text" name="name" required value="{{ old('en_name', $shop->name) }}"/></td>
            </tr>
            <tr>
                <td><strong>Address ::</strong></td>
                <td>::</td>
                <td><input type="text" name="address" required value="{{ old('en_name', $shop->address) }}"/></td>
            </tr>
            <tr>
                <td><strong>Phone Number ::</strong></td>
                <td>::</td>
                <td><input type="number" name="phone" required value="{{ old('en_name', $shop->phone) }}"/></td>
            </tr>
            <tr>
                <td><strong>Facebook ::</strong></td>
                <td>::</td>
                <td><input type="text" name="fblink" required value="{{ old('en_name', $shop->fblink) }}"/></td>
            </tr>
            <tr>
                <td><strong>Description</strong></td>
                <td>::</td>
                <td><textarea name="description" >{{ old('description', $shop->description) }}</textarea></td>
                
            </tr>
            <tr>
                <td colspan="3"><input type="submit" value="Submit"></td>
            </tr>
        </table>
      </center>
    </form>
</div>
    
@endsection