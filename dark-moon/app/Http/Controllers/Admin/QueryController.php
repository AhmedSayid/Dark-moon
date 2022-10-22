<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller ;
use App\Models\Query;
use Illuminate\Http\Request;
use App\Repositories\QueryRepository;
use App\Http\Requests\Admin\QueryCreateRequest;
use App\Http\Requests\Admin\QueryEditRequest;

class QueryController extends Controller
{

    protected $queryRepository;

    public function __construct(QueryRepository $queryRepository)
    {
        $this->queryRepository = $queryRepository;
    }

    public function index(Request $request)
    {
       $list = $this->queryRepository->getQueries($request->all())
       ->paginate(10);
        return view('admin.queries.index', compact('list'));
    }

    public function create()
    {
        return view('admin.queries.create');
    }

    public function store(QueryCreateRequest $request)
    {
        $this->queryRepository->storeOrUpdate($request);
        return redirect()->route('admin.queries.index');
    }


    public function edit(Query $query)
    {
        return view('admin.queries.edit')->with(['query'=>$query]) ;
    }

    public function update(QueryEditRequest $request,Query $query)
    {
        $this->queryRepository->storeOrUpdate($request , $query);
        return redirect()->route('admin.queries.index');
    }


    public function destroy(Query $query)
    {
        $query->delete();
        return redirect()->route('admin.queries.index');
    }
}
