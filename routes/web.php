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

Auth::routes(['verify' => true]);
Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix'	=> 'admin', 'middleware'	=> ['auth','verified']], function()
{
	Route::resource('/users', 'UserController');
});

Route::group(['prefix' => 'home', 'middleware' => ['auth','verified']], function(){
	Route::resource('incidents', 'IncidentController');
	Route::resource('/{type}/messages', 'MessageController');
	Route::resource('structure/departments/projects', 'ProjectController');
	Route::resource('/questions', 'QuestionController');
	Route::resource('projects/posts', 'PostController');
	Route::resource('structure/departments', 'DepartmentController');
	Route::resource('structure/reports', 'ReportsController');
	Route::resource('setings/{type}/{id}/comments', 'CommentController');
	/**
	 * Route Closures
	 */

	Route::post('/{type}/message', [
		'as'	=> 'messages.storeAll',
		'uses'	=> 'MessageController@storeAll'
	]);

	Route::get('/user', [
		'as' 	=> 'home.user',
		'uses'	=> 'UserPageController@home',
	]);
	Route::get('/user/profile/settings', [
		'as' 	=> 'settings',
		'uses'	=> 'UserPageController@settings',
	]);
	Route::get('/user/profile', [
		'as' 	=> 'profile',
		'uses'	=> 'UserPageController@profile',
	]);
	Route::post('/user/profile', [
		'as'	=> 'profile.update',
		'uses'	=> 'UserPageController@update_image'
	]);
	Route::post('/user/password/profile', [
		'as'	=> 'password.update',
		'uses'	=> 'UserController@changePassword'
	]);
});

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

