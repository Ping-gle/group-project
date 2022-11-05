<?php

namespace App\Http\Controllers;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\Relation;
use App\Models\Products;
use App\Models\Regions;
use Illuminate\Http\Request;
use Psr\Http\Message\ServerRequestInterface;

class RegionController extends SearchController
{
    
    function getQuery(): Builder|Relation
    {
        return Regions::orderBy('code');
    }

    function list()
    {   
        $regions = Regions::all();
        return view('region.view',[
        'regions' => $regions
        ]);
    }

    function show(
        $regionCode,
    ){  
        $region = $this->find($regionCode);
        $product = $region->products();
        

        return view ('region.show', [
            'region' => $region,
            'products' => $product,
        ]);
    }
    function create()
    {   
        $this->authorize ('create', Region::class);
        return view('region.create');

    }

    function createAdd(ServerRequestInterface $request)
    {   
        $this->authorize ('create', Region::class);
        $data = $request->getParsedBody();


        Regions::create ([
            'code' => $data['code'],
            'name' => $data['name'],
            'description' => $data['description'],
        ]);

        return redirect()->route('regions-list')
            ->with('status', "Region {$data['code']} was created.");
    }

    function update($code)
    {   
        $this->authorize('update', Region::class);
        $region = Regions::where('code', $code)->first();

        return view('region.update',[
            'region' => $region
        ]);
    }

    function updateAdd(ServerRequestInterface $request, $code)
    {   
        $this->authorize('update', Region::class);
        $data = $request->getParsedBody();

        $region = Regions::where('code', $code)->first();

        $region->update($data);

        return redirect()->route('regions-list')
            ->with('status', "Region {$region['code']} was updated.");
    }

    function delete($code)
    {   
        $this->authorize('delete', Region::class);
        $region = Regions::where('code', $code)->first();

        $region->delete();

        return redirect()->route('regions-list')
            ->with('status', "Region {$region['code']} was deleted.");
    }

    
}
