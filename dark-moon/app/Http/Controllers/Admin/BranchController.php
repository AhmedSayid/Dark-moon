<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller ;
use App\Models\Branch;
use Illuminate\Http\Request;
use App\Repositories\BranchRepository ;
use App\Http\Requests\Admin\BranchCreateRequest ;
use App\Http\Requests\Admin\BranchEditRequest ;

class BranchController extends Controller
{
    
    protected $branchRepository;

    public function __construct(BranchRepository $branchRepository)
    {
        $this->branchRepository = $branchRepository;
    }

    public function index(Request $request)
    {
       $list = $this->branchRepository->getBranches($request)
       ->paginate(10);
        return view('admin.branches.index', compact('list'));
    }

    public function create()
    {
        return view('admin.branches.create');
    }

    public function store(BranchCreateRequest $request)
    {
        $this->branchRepository->storeOrUpdate($request);
        return redirect()->route('admin.branches.index');
    }


    public function edit(Branch $branch)
    {
        return view('admin.branches.edit')->with(['branch'=>$branch]) ;
    }

    public function update(BranchEditRequest $request,Branch $branch)
    {
        $this->branchRepository->storeOrUpdate($request , $branch);
        return redirect()->route('admin.branches.index');
    }

    
    public function destroy(Branch $branch)
    {
        $branch->delete();
        return redirect()->route('admin.branches.index');
    }
}
