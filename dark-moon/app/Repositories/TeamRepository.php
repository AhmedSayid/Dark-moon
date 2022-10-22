<?php

namespace App\Repositories;

use App\Models\Team;
use GuzzleHttp\Psr7\Request;
use App\Http\Services\UploaderService;

class TeamRepository
{
    protected $uploaderService;
    public function __construct(UploaderService $UploaderService)
    {
        $this->uploaderService = $UploaderService;
    }

    public function getTeams()
    {
        $team = Team::query();

        return $team;
    }

    public function storeOrUpdate($request, $team = null)
    {
        if(!$team ){
            $team = new Team();
        }
        // dd($request->all());
        // if($request->file('image')){
        //     $image = $this->uploaderService->upload($request->file('image'), 'team_images');
        //     $team->image = $image;
        // }
        $team->fill($request->all());
        // $team->active = $request->filled('active')? 1 : 0 ;
        $team->save();

        return $team;
    }
}
