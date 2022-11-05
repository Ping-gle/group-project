@extends('layouts.main')

@section('header','- Region Update')

@section('content')

<div class="content">
    <form action="{{ route('region-update-add',['code' => $region['code']])}}" method="post">
      @csrf  
      <center>
        <table>
            <tr>
                <td><strong>Code</strong></td>
                <td>::</td>
                <td><input type="text" name="code" value="{{$region['code']}}"></td>
                
                
            </tr>
            <tr>
                <td><strong>Name</strong></td>
                <td>::</td>
                <td><input type="text" name="name" value="{{$region['name']}}"></td>
            </tr>
            <tr>
                <td><strong>Description</strong></td>
                <td>::</td>
                <td><textarea name="description" >{{ old('description', $region->description)}}</textarea></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td><input type="submit" value="Submit"></td>
            </tr>
        </table>
      </center>
    </form>
</div>
@endsection