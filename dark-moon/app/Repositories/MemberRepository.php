<?php

namespace App\Repositories;

use App\Models\Member;
use App\Models\Team;
use App\Http\Services\UploaderService;
use GuzzleHttp\Psr7\Request;

class MemberRepository
{
    protected $uploaderService;
    public function __construct(UploaderService $UploaderService)
    {
        $this->uploaderService = $UploaderService;
    }
    public function getMembers()
    {
        $member = Member::query();
        return $member;
    }

    public function getTeamData()
    {
        $Data = Team::query();
        return $Data;
    }

    public function storeOrUpdate($request, $member = null)
    {
        if(!$member ){
            $member = new Member();
        }
        if($request->file('image')){
            $image = $this->uploaderService->upload($request->file('image'), 'member_images');
            $member->image = $image;
        }
        $member->fill($request->only('name','email','team_id','position','description'));
        $member->active = $request->filled('active') ? 1 : 0 ;
        $member->save();

        return $member;
    }
}
