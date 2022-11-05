@extends('layouts.main')

@section('header','- Product')

@section('content')
<div class="content">
  
    @can ('create', \App\Models\Product::class)
    <div class="newproduct">
        <b><a href="/product/create">New Product</a></b>
    </div>
    @endcan

<center>
<table>
    <caption>All Our Products list </caption> 
    <tr>
        <th>Image</th>
        <th>Product Code</th>
        <th>English Name</th>
        <th>Thai Name</th>
        <th>Region</th>
        <th>Description</th>
    </tr> 
@foreach($products as $product)
        <tr>
            <td><img src="{{asset('product-image/'.$product['code'].'.jpg')}}" alt=""></td>
            <td align="center"><a href="/product/{{$product['code']}}">{{$product['code']}}</a></td>
            <td align="center">
                {{$product['en_name']}}
            </td>
            <td align="center">
                {{$product['th_name']}}
            </td>
            <td align="center">
                {{ $product->regions->name }}
            </td>
            <td>
                {{$product['description']}}
            </td>
        </tr>
 @endforeach
</table> 
</center>  

</div>

    
@endsection