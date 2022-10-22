<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\BranchRepository ;
use App\Constants\UserTypes;
use App\Models\User;

class HomeController extends Controller
{
    protected $branchRepository;

    public function __construct(BranchRepository $branchRepository)
    {
        $this->branchRepository = $branchRepository;
    }


    public function index(Request $request)
    {
        $branches= $this->branchRepository->getBranches($request)->count();

        return view('admin.home.index',compact('branches'));

    }
    public function language($lang)
    {
        app()->setLocale($lang);
        session()->put(['lang' => $lang]);
        return redirect()->back();
    }

    public function isAdmin()
    {
        return auth()->user()->type == UserTypes::ADMIN;
    }
    public function CompleteOrderCount()
    {
    }
    public function pendingOrderCount()
    {
    }
    public function branchesCount()
    {
    }
    public function complaintsCount()
    {
    }
    public function suggestionsCount()
    {
    }
    public function regionCount()
    {
    }
    public function userCount()
    {
        return   $this->useCallBack(function ($is_admin) {
            if ($is_admin) {
                return User::whereType(3)->count();
            }
            return User::whereHas('orders', function ($q) {
                return   $q->whereHas('branch', function ($q) {
                    return  $q->where('id', auth()->user()->branch->id);
                });
            });
        });
    }


    public function  useCallBack(callable $callback)
    {
        return  $callback($this->isAdmin());
    }






}
