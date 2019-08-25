<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/public', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function(){
	Route::resource('/home/admin/users', 'UserController');
	Route::resource('/home/admin/roles', 'RoleController');

	Route::resource('/home/chats', 'ChatController');

	Route::resource('/home/projects', 'ProjectController');
	Route::resource('/home/projects/activities', 'ActivityController');
	Route::resource('/home/projects/tasks', 'TasksController');
	Route::resource('/home/users/teams', 'TeamController');

	Route::resource('/home/medical/cases', 'DiseaseCaseController');
	Route::resource('/home/medical/diseases', 'DiseaseController');
	Route::resource('/home/employee/leaves', 'LeaveController');
	Route::resource('/home/medical/tracker', 'PatternTrackController');
	# Route::resource('', '');
	# Route::resource('', '');

	Route::get('/home/admin', [
		'as' => 'admin',
		'middleware' => 'role:super-admin|admin',
		'uses' => 'AdminPageController@index',
	]);

	Route::get('/locked/{id}', [
		'as'	=> 'lock',
		'uses'	=> 'PagesController@lock',
	]);

	Route::get('/unlocked', [
		'as'	=> 'unlock',
		'uses'	=> 'PagesController@unlock',
	]);

	Route::get('/home/{id}/profile/', [
		'as'	=> 'home.profile',
		'uses'	=> 'PagesController@profile',
	]);

	Route::get('/home/{id}/messaging/', [
		'as'	=> 'home.messaging',
		'uses'	=> 'PagesController@messaging',
	]);

	Route::get('/home/admin/roles/permissions', [
		'as'	=> 'permissions',
		'middleware' => 'role:super-admin|admin',
		'uses'	=> 'AdminPageController@perms',
	]);

	Route::get('/home/admin/pattern-tracker', [
		'as'	=> 'tracker',
		'middleware' => 'role:super-admin|admin|pno|pno-admin|supervisor',
		'uses'	=> 'PagesController@tracker',
	]);
});

Route::group(['middleware' => 'web'], function(){
	Route::get('/terms', [
		'as'	=> 'terms',
		'uses'	=>	function(){
			return view('web.terms');
		}
	]);

	Route::get('/help', [
		'as'	=> 'help',
		'uses'	=>	function(){
			return view('web.help');
		}
	]);
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
