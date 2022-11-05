@extends('layouts.main')

@section('header','- Product - Create')

@section('content')

<div class="content">
    <form action="{{ route('product-create-add') }}" method="post">
      @csrf
      <center>
        <div class="P_create">
        <table>
            <tr>
                <td><strong>Code</strong></td>
                <td>::</td>
                <td><input type="text" name="code" required/></td>
                
                
            </tr>
            <tr>
            <td><strong>English name</strong></td>
                <td>::</td>
                <td><input type="text" name="en_name" required/></td>
            </tr>
            <td><strong>Thai name</strong></td>
                <td>::</td>
                <td><input type="text" name="th_name" required/></td>
            </tr>
            <tr>
                <td><strong>Regions</strong></td>
                <td>::</td>
                <td><select name="regions">
                <option value="">----- Please select regions ------</option>
                    @foreach($regions as $region)
                            <option value="{{ $region->code }}" @selected(old('region')===$region->code)>{{ $region->name }}</option>
                    @endforeach
                        </select></td>
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
        </div>
      </center>
    </form>
</div>
    
@endsection