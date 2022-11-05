@extends('layouts.main')

@section('header',$product['name'])

@section('content')
<div class="content">
    <div class="show">

        <div class="updateproduct">
        @can('update', \App\Models\Product::class)
            <b><a href="{{route('product-update',['code' => $product['code']])}}"> Update </a>
        @endcan
        @can('delete', \App\Models\Product::class)
            <a href="{{route('product-delete',['code' => $product['code']])}}">Delete</a></b>
        @endcan
        </div>

        <br>
        <span><strong>Code</strong>: {{$product['code']}}</span><br>
        <span><strong>English Name</strong>: {{$product['en_name']}}</span><br>
        <span><strong>Thai Name</strong>: {{$product['th_name']}}</span><br>
        <span><strong>Description ::</strong>: {{$product['description']}}</span><br>

        
    </div>
</div>

@endsection