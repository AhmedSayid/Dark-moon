<?php

namespace App\Repositories;

use App\Models\Project;
use GuzzleHttp\Psr7\Request;

use App\Http\Services\UploaderService;

class ProjectsRepository
{
    protected $uploaderService ;

    public function __construct(UploaderService $uploaderService)
    {
        $this->uploaderService = $uploaderService;
    }

    public function getProjects()
    {
        $Project = Project::query();

        return $Project;
    }

    // public function parentServices($request)
    // {
    //     $service = Project::query()->where('parent_id', null);

    //     return $service;
    // }

    // public function getSubServices($serviceId)
    // {
    //     $sub_service = Project::query()->where('parent_id' , $serviceId);

    //     return $sub_service;
    // }
    //
    public function storeOrUpdate($request, $Project = null)
    {
        if(!$Project ){
            $Project = new Project();
        }

        if($request->file('image')){
            $image = $this->uploaderService->upload($request->file('image'), 'projects_images');
            $Project->image = $image;
        }

        $Project->fill($request->only('name','from_date','url'));
        $Project->save();

        return $Project;
    }
}
