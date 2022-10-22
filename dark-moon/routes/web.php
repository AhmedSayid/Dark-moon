<?php

use App\Http\Controllers\Admin\login\LoginController;
use App\Http\Controllers\ServiceController;
use App\Models\Service;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::prefix('admin')->attribute('namespace', 'Admin')
->middleware('admin')
->group(function () {
    Route::get('/', 'HomeController@index')->name('admin.home.index');

    Route::resource('services', 'ServiceController', ['as' => 'admin'] );
    Route::resource('projects', 'ProjectsController', ['as' => 'admin'] );
    Route::resource('branches', 'BranchController',['as' => 'admin'] );
    Route::resource('queries', 'QueryController',['as' => 'admin'] );
    Route::resource('blogs', 'BlogsController',['as' => 'admin'] );
    Route::resource('teams', 'TeamController',['as' => 'admin'] );
    Route::resource('members', 'MemberController',['as' => 'admin'] );
});

// Karl -> Mohamed Khaled // login routes
Route::prefix('login')
->attribute('namespace','Admin\login')
->group(function(){
    Route::resource('/', 'LoginController' ,['as' => 'Login']);
    Route::get('/Logout','LoginController@logout')->name('Logout');
});
///////////////////

Route::prefix('/')->attribute('namespace', 'Web')
->group(function () {
    Route::get('/', 'HomeController@index')->name('web.home.index');
    Route::get('toggleLanguage', 'HomeController@language')->name('admin.language');

    Route::get('/portfolo-detail', 'HomeController@portfolioDetails')->name('web.home.portfolioDetails');

    // for sub_service
    Route::get('/Services/{sub_services}', 'HomeController@subservices')->name('web.home.sub_services');

    // send_querys
    Route::post('/contact','HomeController@store')->name('web.home.store');
});
