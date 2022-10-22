<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller ;
use App\Models\Project;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\ProjectCreateRequest;
use App\Repositories\ProjectsRepository;

class ProjectsController extends Controller
{

    protected $ProjectsRepository;

    public function __construct(ProjectsRepository $ProjectsRepository)
    {
        $this->ProjectsRepository = $ProjectsRepository;
    }

    public function index(Request $request)
    {
       $list = $this->ProjectsRepository->getProjects($request->all())
       ->paginate(10);

        return view("admin.projects.index", compact('list'));
    }

    public function create(Request $request)
    {
        return view('admin.projects.create');
    }

    public function store(ProjectCreateRequest $request)
    {
        $this->ProjectsRepository->storeOrUpdate($request);
        
        return redirect(route('admin.projects.index'));
    }


    // public function edit(Service $service, Request $request)
    // {
    //     $parents = $this->ProjectsRepository->parentServices($request->all())->pluck('id', 'name');
    //     return view('admin.services.edit',compact('service', 'parents')) ;
    // }

    // public function update(ServiceEditRequest $request,Service $service)
    // {
    //     $this->ProjectsRepository->storeOrUpdate($request , $service);
    //     return redirect()->route('admin.services.index');
    // }


    public function destroy(Project $Project)
    {
        $Project->delete();
        return redirect(route('admin.projects.index'));
    }
}
