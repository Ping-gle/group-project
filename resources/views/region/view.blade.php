
@extends('layouts.main')

@section('header','- Regions')

@section('content')

<div class="content">
    <div class="regions">
        @can ('create', \App\Models\Region::class)
            
                <b><a href="/region/create">New Region</a></b>
            </div>
        @endcan
        <div class="newregion">
        <center>
            <table>
                <caption>All Regions list</caption>
                <tr>
                    <th>Code</th>
                    <th>Region</th>
                    <th>Description</th>
                </tr>
           
                @foreach($regions as $region)
                <tr>
                    <td align="center"><a href="/region/{{$region['code']}}">{{$region['code']}}</a></td>
                    <td align="center">{{$region['name']}}</td>
                    <td>{{$region['description']}}</td>

                </tr>
                @endforeach
            </table>
            </center>
     </div> 
</div>
    
@endsection