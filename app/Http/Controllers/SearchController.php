<?php

namespace App\Http\Controllers;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\Relation;
use Psr\Http\Message\ServerRequestInterface;
use App\Models\Products;
use Illuminate\Http\Request;

abstract class SearchController extends Controller
{ 

    abstract function getQuery(): Builder|Relation;

    function view(ServerRequestInterface $request)
    {   
        $data = $request->getQueryParams();
        $products = $this->search($data);
        

        return view('search',[
        'products' => $products
    
        ]);
        
    }

    function filterByterm(Builder|Relation $query, ?string $term): Builder|Relation
    {

        if (!empty($term)) {
            foreach (\preg_split('/\s+/', \trim($term)) as $word) {
                $query->where(function (Builder|Relation $innerQuery) use ($word) {
                    $innerQuery
                        ->where('code', 'LIKE', "%{$word}%")
                        ->orWhere('name', 'LIKE', "%{$word}%");
                });
            }
        }

        return $query;
    }
    
    function search(array $search): Builder|Relation
    {
        $query = $this->getQuery();
        return $this->filterBySearch($query, $search);
    }

    function find(string $code)
    {
        return $this->getQuery()->where('code', $code)->firstOrFail();
    }

    function prepareSearch(array $search): array
    {
        
        $search['term'] = $search['term'] ?? null;
        return $search;
    }

    function filterBySearch(Builder|Relation $query, array $search) {
        return $this->filterByTerm($query, $search['term']);
        }
}   
