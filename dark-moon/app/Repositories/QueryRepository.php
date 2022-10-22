<?php
// use namespace
namespace App\Repositories;

// calling classes
use App\Models\Query;
use GuzzleHttp\Psr7\Request;

// class
class QueryRepository
{
    // getQueries
    public function getQueries($request)
    {
        $query = Query::query();

        return $query;
    }

    // store or update Queries
    public function storeOrUpdate($request, $query = null)
    {
        if(!$query ){
            $query = new Query();
        }
        // dd($request->all());

        $query->fill($request->all());
        // $query->active = $request->filled('active')? 1 : 0 ;
        $query->save();

        return $query;

    }
}
