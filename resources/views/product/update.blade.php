@extends('layouts.main')

@section('header','- Product Update')

@section('content')

<div class="content">
    <form action="{{ route('product-update-add',['code' => $product['code']])}}" method="post">
      @csrf  
      <center>
        <table>
            <tr>
                <td><strong>Code</strong></td>
                <td>::</td>
                <td><input type="text" name="code" required value="{{ old('code', $product->code) }}"></td>
            </tr>
            <tr>
                <td><strong>English Name ::</strong></td>
                <td>::</td>
                <td><input type="text" name="en_name" required value="{{ old('en_name', $product->en_name) }}"/></td>
            </tr>
            <tr>
                <td><strong>Thai Name</strong></td>
                <td>::</td>
                <td><input type="text" name="th_name" required value="{{ old('th_name', $product->th_name) }}"/></td>
            </tr>
            <tr>
                <td><strong>Regions</strong></td>
                <td>::</td>
                <td><select name="regions">
                    @foreach($regions as $region)
                            <option value="{{ $region->code }}" @selected(old('region')===$region->code)>{{ $region->name }}</option>
                    @endforeach
                        </select></td>
            </tr>
            <tr>
                <td><strong>Description</strong></td>
                <td>::</td>
                <td><textarea name="description" >{{ old('description', $product->description) }}</textarea></td>
                
            </tr>
            <tr>
                <td colspan="3"><input type="submit" value="Submit"></td>
            </tr>
        </table>
      </center>
    </form>
</div>
    
@endsection