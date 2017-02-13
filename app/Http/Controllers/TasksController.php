<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Input;
use Redirect;
use App\Project;
use App\Task;
//use App\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Project $project)
    {
        //

        return view('tasks.index',compact('project'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Project $project)
    {
        //
        return view('tasks.create',compact('project'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    protected $rules=[
                        'name'=>['required','min:3'],
                        'slug'=>['required'],
                        'description'=>['required'],
                    ];
    public function store(Project $project, Request $request)
    {
        //
        $this->validate($request,$this->rules);
        $input =Input::all();
        $input['project_id']=$project->id;
        Task::create($input);

        return Redirect::route('projects.show',$project->slug)->with('message','Task For Project is Created');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project,Task $task)
    {
        //
        return view('tasks.show',compact('project','task'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project,Task $task)
    {
        //
        return view('tasks.edit',compact('project','task'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Project $project, Task $task, Request $request)
    {
        //
        $this->validate($request,$this->rules);
        $input =array_except(Input::all(),'_method');
        $task->update($input);

        return Redirect::route('projects.tasks.show',[$project->slug,$task->slug])->with('message','Task is updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project,Task $task)
    {
        //

        $task->delete();
        return Redirect::route('projects.show'.$project->slug)->with('message','Task is deleted');
    }
}
