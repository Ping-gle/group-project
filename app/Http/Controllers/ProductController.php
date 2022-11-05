<?php

namespace App\Http\Controllers;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\Relation;
use App\Models\Products;
use App\Models\Regions;
use Illuminate\Http\Request;
use Psr\Http\Message\ServerRequestInterface;
use Illuminate\Database\QueryException;

class ProductController extends SearchController
{   

    function getQuery(): Builder|Relation
    {
        return Products::orderBy('code');
    }

    function list(ServerRequestInterface $request)
    {   $search = $this->prepareSearch($request->getQueryParams());
        $products = Products::all();
        return view('product.view',[
        'products' => $products,
        'search' => $search,
        ]);
    }
    function show($code){
        $product = Products::where('code',$code)->first();
        $region = Regions::where('code', $product['catCode'])->first();
       
        return view ('product.show',[
        'product' => $product,
        'regions' => $region,
        ]);
        
    }

    function create()
    {
        $this->authorize ('create', Product::class);
        $regions = Regions::orderBy('code')->get();
        return view('product.create', [
            'regions' => $regions,
        ]);

    }
    
    function createAdd(ServerRequestInterface $request, RegionController $region)
    {
        try{
        $this->authorize ('create', Product::class);
        $product = new Products();
        $data = $request->getParsedBody();
        $product->fill($data);
        $region = $region->find($data['regions']);
        $product->regions()->associate($region);
        $product->save();


        

        return redirect()->route('product-list')
            ->with('status', "Product {$data['code']} was created.");
    }catch(QueryException $excp) {
        return redirect()->back()->withInput()->withErrors([
            'error'=> $excp->errorInfo[2],
        ]);
    }
}

    function update($code)
    {
        $this->authorize('update', Product::class);
        $product = $this->find($code);
        $regions = Regions::orderBy('code')->get();

        return view('product.update',[
            'product' => $product,
            'regions' => $regions,
        ]);
    }

    function updateAdd(ServerRequestInterface $request, $code)
    {
        try{
        $this->authorize('update', Product::class);
       $data = $request->getParsedBody();

       $product = Products::where('code', $code)->first();

        $product->update($data);

        return redirect()->route('product-show',['code' => $product['code']])
            ->with('status', "Product {$product['code']} was updated.");
        }catch(QueryException $excp) {
            return redirect()->back()->withInput()->withErrors([
                'error'=> $excp->errorInfo[2],
            ]);
        }
    }

    function delete($code)
    {   
        $this->authorize('delete', Product::class);
        $product = Products::where('code', $code)->first();

        $product->delete();

        return redirect()->route('product-list')
            ->with('status', "Product {$product['code']} was Deleted.");
    }
    

}


    function filterByterm(Builder|Relation $query, ?string $term): Builder|Relation
    {

        if (!empty($term)) {
            foreach (\preg_split('/\s+/', \trim($term)) as $word) {
                $query->where(function (Builder|Relation $innerQuery) use ($word) {
                    $innerQuery
                        ->where('code', 'LIKE', "%{$word}%")
                        ->orWhere('th_name', 'LIKE', "%{$word}%")
                        ->orWhere('en_name', 'LIKE', "%{$word}%")
                        ->orWhereHas('region', function (Builder $region) use ($word) {
                            $region->where('name', 'LIKE', "%{$word}%");
                        });
                });
            }
        }

        return $query;
    }
