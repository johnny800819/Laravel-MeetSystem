<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => 'web'], function () {
    //Home
    Route::auth();
    Route::get('/home', 'HomeController@index');
    Route::get('/home/resume', ['as' => 'resume', 'uses' => 'HomePage\HPcontroller@index']);
    Route::get('/home/pratice', ['as' => 'pratice', function (){
        return App::make(App\Http\Controllers\HomePage\HPcontroller::class)->pratice('');
    }]);
    Route::get('/home/pratice/sub1', ['as' => 'sub1_pratice', function (){
        return App::make(App\Http\Controllers\HomePage\HPcontroller::class)->pratice('sub1');
    }]);
    Route::get('/home/pratice/sub2', ['as' => 'sub2_pratice', function (){
        return App::make(App\Http\Controllers\HomePage\HPcontroller::class)->pratice('sub2');
    }]);
    Route::post('/home/pratice/sub2', ['as' => 'sub2_submit', 'uses' => 'HomePage\HPcontroller@submit']);
});

Route::group(['middleware' => 'web'], function () {
    Route::auth();
    //Meeting System
    Route::get('/meethome','MeetSystem\meethomeController@index');
    Route::post('/calendar-feed','MeetSystem\meethomeController@calendarfeed');
    Route::get('/meethome/new_meet', ['as' => 'new_meet', 'uses' => 'MeetSystem\meethomeController@create']);
    Route::resource('/meethome/get_user','MeetSystem\meethomeController@get_user');
    Route::post('/meethome/new_meet/store','MeetSystem\meethomeController@store');
});

Route::group(['middleware' => 'web'], function () {
    //Testing
    Route::auth();
    Route::get('/my_test', 'MyTest@index');
});

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

/*
Route::group(['middleware' => ['web'], 'namespace' => 'Admin', 'prefix' => 'admin'], function () {
    Route::auth();

    Route::get('/home', ['as' => 'admin.home', 'uses' => 'HomeController@index']);
    Route::resource('admin_user', 'AdminUserController');
    Route::post('admin_user/destroyall',['as'=>'admin.admin_user.destroy.all','uses'=>'AdminUserController@destroyAll']);
    Route::resource('role', 'RoleController');
    Route::post('role/destroyall',['as'=>'admin.role.destroy.all','uses'=>'RoleController@destroyAll']);
    Route::get('role/{id}/permissions',['as'=>'admin.role.permissions','uses'=>'RoleController@permissions']);
    Route::post('role/{id}/permissions',['as'=>'admin.role.permissions','uses'=>'RoleController@storePermissions']);
    Route::resource('permission', 'PermissionController');
    Route::post('permission/destroyall',['as'=>'admin.permission.destroy.all','uses'=>'PermissionController@destroyAll']);
    Route::resource('blog', 'BlogController');
});
Route::get('/admin', function () {
    return view('admin.welcome');
});
*/
