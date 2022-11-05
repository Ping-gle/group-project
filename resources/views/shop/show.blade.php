@extends('layouts.main')

@section('header',$shop['name'])

@section('content')
<div class="content">
    <div class="show">

        @can('update', \App\Models\Shop::class)
            <b><a href="{{route('shop-update',['code' => $shop['code']])}}"> Update </a>
        @endcan
        @can('delete', \App\Models\Shop::class)
            <a href="{{route('shop-delete',['code' => $shop['code']])}}">Delete</a></b>
        @endcan
        </div>


        <br>
        <span><strong>Code</strong>: {{$shop['code']}}</span><br>
        <span><strong>Shop Name</strong>: {{$shop['name']}}</span><br>
        <span><strong>Address</Address></strong>: {{$shop['address']}}</span><br>
        <span><strong>Phone number</strong>: {{$shop['phone']}}</span><br>
        <span><strong>Facebook</strong>: <a href="{{$shop['fblink']}}"> ร้าน {{ $shop['name'] }}</a></span><br>
        <span><strong>Description</strong>: {{$shop['description']}}</span><br>

    </div>
</div>

@endsection