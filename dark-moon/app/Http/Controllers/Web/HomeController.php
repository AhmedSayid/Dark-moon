<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\Web\Contact;
use App\Models\Service;
use App\Models\Blog;
use Illuminate\Http\Request;
use App\Repositories\QueryRepository;
use App\Repositories\ServiceRepository;
use App\Repositories\BlogsRepository;
use App\Repositories\ProjectsRepository;
use App\Repositories\MemberRepository;

class HomeController extends Controller
{
    protected $QueryRepository,$ServiceRepository,$BlogsRepository,$ProjectsRepository,$MemberRepository;

    public function __construct(QueryRepository $QueryRepository,ServiceRepository $ServiceRepository,BlogsRepository $BlogsRepository,ProjectsRepository $ProjectsRepository,
    MemberRepository $MemberRepository)
    {
        $this->QueryRepository = $QueryRepository;
        $this->ServiceRepository = $ServiceRepository;
        $this->BlogsRepository = $BlogsRepository;
        $this->ProjectsRepository = $ProjectsRepository;
        $this->MemberRepository = $MemberRepository;
    }
    public function index(Request $request)
    {
        $services = $this->ServiceRepository->parentServices($request)->get();
        $Blogs = $this->BlogsRepository->getBlogs()->get();
        $Projects = $this->ProjectsRepository->getProjects()->get();
        //members func_s
        $Members = $this->MemberRepository->getMembers()->get();
        $Members_count = $this->MemberRepository->getMembers()->count();
        //
        $lang = app()->getLocale();

        return view('web.welcome',compact('services','Blogs','lang','Projects','Members','Members_count'));
    }
    public function language()
    {
        if (app()->getLocale() == 'en') {
            app()->setLocale('ar');
            session()->put('locale', 'ar');
        }
        else{
            app()->setLocale('en');
            session()->put('locale', 'en');
        }
        return redirect()->back();
    }
    public function store(Request $request)
    {
        $this->QueryRepository->storeOrUpdate($request);
        return response()->json(['OK'=>"Your message has been sent. Thank you!"]);
    }

    public function portfolioDetails(Request $request)
    {
        return view('web.portfolio-details');
    }

    public function subservices($serviceId)
    {
        $sub_services = $this->ServiceRepository->getSubServices($serviceId)->get();

        return view('web.sub_services',compact('sub_services'));

    }
}
