<?php

namespace App\Repositories;

use App\Models\Service;
use GuzzleHttp\Psr7\Request;

use App\Http\Services\UploaderService ;
class ServiceRepository
{
    protected $uploaderService ;

    public function __construct(UploaderService $uploaderService)
    {
        $this->uploaderService = $uploaderService;
    }

    public function getServices($request)
    {
        $service = Service::query();

        return $service;
    }

    public function parentServices($request)
    {
        $service = Service::query()->where('parent_id', null);

        return $service;
    }

    public function getSubServices($serviceId)
    {
        $sub_service = Service::query()->where('parent_id' , $serviceId);

        return $sub_service;
    }
    //
    public function storeOrUpdate($request, $service = null)
    {
        if(!$service ){
            $service = new Service();
        }

        if($request->file('image')){
            $image = $this->uploaderService->upload($request->file('image'), 'services_images');
            $service->image = $image ;
        }
        if($request->file('cover_image')){
            $coverImage = $this->uploaderService->upload($request->file('cover_image'), 'services_images');
            $service->cover_image = $coverImage ;
        }
        if($request->file('video')){
            $video = $this->uploaderService->upload($request->file('video'), 'services_video');
            $service->video = $video ;
        }
        $service->fill($request->all());
        $service->active = $request->filled('active')? 1 : 0 ;
        $service->save();

        return $service;
    }
}
