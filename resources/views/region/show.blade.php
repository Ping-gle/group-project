@extends('layouts.main')

@section('header',$region['name'])

@section('content')
<div class="content">
    <div class="show">

        <div class="updateregion">
        @can('update', \App\Models\Region::class)
            <b><a href="{{route('region-update',['code' => $region['code']])}}"> Update </a>
        @endcan
        @can('delete', \App\Models\Region::class)
            <a href="{{route('region-delete',['code' => $region['code']])}}">Delete</a></b>
        @endcan
        </div>
        
        <br>
        <span><strong>Code</strong>: {{$region['code']}}</span><br>
        <span><strong>Name</strong>: {{$region['name']}}</span><br>
        <span><strong>Description ::</strong>: {{$region['description']}}</span><br>

    </div>
</div>

@endsection
