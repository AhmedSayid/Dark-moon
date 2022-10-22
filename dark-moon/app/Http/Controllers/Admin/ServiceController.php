<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller ;
use App\Models\Service;
use Illuminate\Http\Request;
use App\Repositories\ServiceRepository;
use App\Http\Requests\Admin\ServiceCreateRequest;
use App\Http\Requests\Admin\ServiceEditRequest;

class ServiceController extends Controller
{

    protected $serviceRepository;

    public function __construct(ServiceRepository $serviceRepository)
    {
        $this->serviceRepository = $serviceRepository;
    }

    public function index(Request $request)
    {
       $list = $this->serviceRepository->getServices($request->all())
       ->paginate(10);
        return view('admin.services.index', compact('list'));
    }

    public function create(Request $request)
    {
        $parents = $this->serviceRepository->parentServices($request->all())->pluck('id', 'name');
        return view('admin.services.create', compact('parents'));
    }

    public function store(ServiceCreateRequest $request)
    {
        $this->serviceRepository->storeOrUpdate($request);
        return redirect()->route('admin.services.index');
    }


    public function edit(Service $service, Request $request)
    {
        $parents = $this->serviceRepository->parentServices($request->all())->pluck('id', 'name');
        return view('admin.services.edit',compact('service', 'parents')) ;
    }

    public function update(ServiceEditRequest $request,Service $service)
    {
        $this->serviceRepository->storeOrUpdate($request , $service);
        return redirect()->route('admin.services.index');
    }


    public function destroy(Service $service)
    {
        $service->delete();
        return redirect()->route('admin.services.index');
    }
}
