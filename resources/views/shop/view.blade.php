@extends('layouts.main')

@section('header', '- Shops')

@section('content')
<div class="content">
    <div class="show">

    <div class="content">
    @can ('create', \App\Models\Shop::class)
    <div class="newproduct">
        <b><a href="/shop/create">New shop</a></b>
    </div>
    @endcan
    <center>
        <table width="1500px" height="auto">
        <tr>
            <th>Code</th>
            <th>Shops Name</th>
            <th>Address</th>
            <th>Phone Number</th>
            <th>Facebook</th>
            <th>Description</th>
        </tr>
        @foreach($shops as $shop)
        <tr>
        <td align="center"><a href="/shop/{{$shop['code']}}">{{$shop['code']}}</a></td>
        <td align="center">{{$shop['name']}}</td>
        <td align="center">{{$shop['address']}}</td>
        <td align="center">{{$shop['phone']}}</td>
        <td align="center"><a href="{{$shop['fblink']}}">
            <div class="imageFacebook"><img src="background-image/facebook1.png" alt=""></a></div></td>
        <td>{{$shop['description']}}</td>
        </tr>
        @endforeach
        
        </table>
        </center>
    </div>
</div>

@endsection