<?php

namespace App\Repositories;

use App\Models\Branch;
use GuzzleHttp\Psr7\Request;

class BranchRepository
{
    public function getBranches($request)
    {
        $branches = Branch::query();
        if($request->filled('name')){
            $branches= $branches->where('name','like', '%'. $request->name . '%');
        }
        if($request->filled('phone')){
            $branches= $branches
            ->where(function($query)use ($request){
                return $query->where('phone_one','like', '%'. $request->phone . '%')
                ->orWhere('phone_two','like', '%'. $request->phone . '%');
            });
        }
        return $branches;
    }

    public function storeOrUpdate($request, $branch = null)
    {
        if(!$branch ){
            $branch = new Branch();
        }
        // dd($request->all());
        $branch->fill($request->all());
        $branch->active = $request->filled('active')? 1 : 0 ;
        $branch->save();

        return $branch;
    }
}
