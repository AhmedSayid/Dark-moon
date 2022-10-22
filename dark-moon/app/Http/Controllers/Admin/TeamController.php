<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller ;
use App\Models\Team;
use Illuminate\Http\Request;
use App\Repositories\TeamRepository;
use App\Http\Requests\Admin\TeamCreateRequest;
use App\Http\Requests\Admin\TeamEditRequest;

class TeamController extends Controller
{

    protected $teamRepository;

    public function __construct(TeamRepository $teamRepository)
    {
        $this->teamRepository = $teamRepository;
    }

    public function index(Request $request)
    {
       $list = $this->teamRepository->getTeams($request->all())
       ->paginate(10);
        return view('admin.teams.index', compact('list'));
    }

    public function create()
    {

        return view('admin.teams.create');
    }

    public function store(TeamCreateRequest $request)
    {
        $this->teamRepository->storeOrUpdate($request);
        return redirect(route('admin.teams.index'));
    }


    public function edit(Team $team)
    {
        return view('admin.teams.edit')->with(['team'=>$team]) ;
    }

    public function update(TeamEditRequest $request,Team $team)
    {
        $this->teamRepository->storeOrUpdate($request , $team);
        return redirect()->route('admin.teams.index');
    }


    public function destroy(Team $team)
    {
        $team->delete();
        return redirect()->route('admin.teams.index');
    }
}
