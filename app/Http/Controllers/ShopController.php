<?php

namespace App\Http\Controllers;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Shops;
use Illuminate\Database\QueryException;
use Psr\Http\Message\ServerRequestInterface;

class ShopController extends SearchController


{

    function getQuery(): Builder|Relation
    {
        return Shops::orderBy('code');
    }

    function list()
    {   
        $shops = Shops::all();
        return view('shop.view',[
        'shops' => $shops
        ]);
    }

    function create()
    {
        $this->authorize ('create', Shop::class);
        return view('shop.create');

    }

    function createAdd(ServerRequestInterface $request)
    {   
        $this->authorize('create', Shop::class);
        try{
        $shop = Shops::create($request->getParsedBody());
        return redirect()->route('shop-list')
        ->with('status', "Shop {$shop->code} was created.");
        } catch(QueryException $excp) {
            return redirect()->back()->withInput()->withErrors([
                'error'=> $excp->errorInfo[2],
            ]);}
    }

    function show($code){
        
        $shop = Shops::where('code',$code)->first();
       
        return view ('shop.show',[
        'shop' => $shop,
        ]);
        
    }

    function update($code)
    {
        $this->authorize('update', Shop::class);
        $shop = $this->find($code);

        return view('shop.update',[
            'shop' => $shop,
        ]);
    }

    function updateAdd(ServerRequestInterface $request, $code)
    {
        try{
        $this->authorize('update', Shop::class);
       $data = $request->getParsedBody();

       $shop = Shops::where('code', $code)->first();

        $shop->update($data);

        return redirect()->route('shop-show',['code' => $shop['code']])
            ->with('status', "Shop {$shop['code']} was updated.");
        }catch(QueryException $excp) {
            return redirect()->back()->withInput()->withErrors([
                'error'=> $excp->errorInfo[2],
            ]);
        }
    }

    function delete($code)
    {   
        $this->authorize('delete', Shop::class);
        $shop = Shops::where('code', $code)->first();

        $shop->delete();

        return redirect()->route('shop-list')
            ->with('status', "Product {$shop['code']} was Deleted.");
    }

    function showProduct($shopcode, $productCode){
        $shop = $this->find($shopcode);
        $product = Products::where('code', $productCode)->FirstOrFail();

        
        $product = $shop->product();

        return view ('shop.show-product', [
            'shop' => $shop,
            'product' => $product,
        ]);
    }
}
