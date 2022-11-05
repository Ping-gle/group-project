@extends('layouts.main')

@section('header','- New Region')

@section('content')

<div class="content">
    <form action="{{ route('region-create-add') }}" method="post">
      @csrf  
      <center>
        <div class="S_create">
        <table>
            <tr>
                <td><strong>Region Code</strong></td>
                <td>::</td>
                <td><input type="text" name="code" ></td>
                
                
            </tr>
           
            <tr>
                <td><strong>Region Name</strong></td>
                <td>::</td>
                <td><input type="text" name="name" ></td>
            </tr>

            <tr>
                <td><strong>Region Description</strong></td>
                <td>::</td>
                <td><textarea name="description" cole="80" row="10"></textarea></td>
                
            </tr>
        </table>
        </div>
      </center>
        <b</br>
        <input type="submit" value="Submit">
    </form>
</div>

@endsection