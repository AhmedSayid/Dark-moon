<?php

namespace App\Http\Controllers\Admin\login;


use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\LoginAttemptRequest;
use App\Repositories\LoginRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $LoginRepository;

    public function __construct(LoginRepository $LoginRepository)
    {
        $this->LoginRepository = $LoginRepository;

        // $this->LoginRepository->check();
    }

    public function index()
    {
        if(Auth::check()){
            return redirect(route('admin.home.index'));
        }

        return view('admin.login.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LoginAttemptRequest $request)
    {

        $login = $this->LoginRepository->login($request);

        if($login){
            return redirect(route('admin.home.index'));
        }else{
            return redirect()->back();
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        //
    }

    public function logout()
    {
        # code...
        if(Auth::check()){
            Auth::logout();
        }
        return redirect('/');
    }
}
