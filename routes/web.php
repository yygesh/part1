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

Route::model('tasks','Task');
Route::model('projects','Project');

Route::bind('tasks',function($slug,$route){
	return App\Task::whereSlug($slug)->first();
});
Route::bind('projects',function($slug,$route){
	
	return App\Project::whereSlug($slug)->first();
});
// Route::bind('article_or_category', function ($slug) {
//     return Project::where('slug', $slug)->first();
              
// });
// Route::get('{article_or_category}', ['as'=>'projects:item', 'uses'=>'ProjectsController@show']);

Route::post('route_define','ProjectsController@route_define');

Route::resource('projects','ProjectsController');

Route::resource('projects.tasks','TasksController');
