<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller ;
use App\Models\Member;
use Illuminate\Http\Request;
use App\Repositories\TeamRepository;
use App\Repositories\MemberRepository;
use App\Http\Requests\Admin\MemberCreateRequest;
use App\Http\Requests\Admin\MemberEditRequest;

class MemberController extends Controller
{

    protected $memberRepository,$TeamController;

    public function __construct(MemberRepository $memberRepository,TeamRepository $TeamController)
    {
        $this->memberRepository = $memberRepository;
        $this->TeamController = $TeamController;
    }

    public function index(Request $request)
    {
       $list = $this->memberRepository->getMembers($request->all())
       ->paginate(10);
        return view('admin.members.index', compact('list'));
    }

    public function create()
    {
        $teams = $this->TeamController->getTeams()->get();
        return view('admin.members.create',compact('teams'));
    }

    public function store(MemberCreateRequest $request)
    {
        $this->memberRepository->storeOrUpdate($request);
        return redirect()->route('admin.members.index');
    }


    public function edit(Member $member)
    {
        return view('admin.members.edit')->with(['members'=>$member]) ;
    }

    public function update(MemberEditRequest $request,Member $member)
    {
        $this->memberRepository->storeOrUpdate($request , $member);
        return redirect()->route('admin.members.index');
    }


    public function destroy(Member $member)
    {
        $member->delete();
        return redirect()->route('admin.members.index');
    }
}
