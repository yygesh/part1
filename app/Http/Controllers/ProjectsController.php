<?php 

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Input;
use Redirect;
use App\Project;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProjectsController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()

    {

         
        $projects = Project::all();
        return view('projects.index', compact('projects'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('projects.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */

    /*
    validation format
    */
    protected $rules=['name'=>['required','min:3'],
                        'slug'=>['required'],
                        ];
    public function store(Request $request)
    {
        //

        $this->validate($request, $this->rules);
        $input =Input::all();
        Project::create($input);
        return Redirect::route('projects.index')->with('message','Project successfully Created');

    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Project $project
     * @return Response
     */
    public function show(Project $project)
    {
        
       // echo "hello";
        return view('projects.show', compact('project'));
       //return response()->json([$project]);
        
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Project $project
     * @return Response
     */
    public function edit(Project $project)
    {
        
        //  $slug=$_GET['id'];
        // $projects = Project::find($slug);
         // return $project;
        return json_encode($project);
        // return view('projects.edit', compact('project'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Project $project
     * @return Response
     */
    public function route_define(Request $request){
         $this->validate($request,$this->rules);
        // $input=array_except($request->all(),'_method');
        // $project->update($input);
        $data = Project::find ( $request->id );
        $data->name = $request->name;
        $data->slug = $request->slug;
        $data->updated_at = $request->updated_at;
        $data->created_at = $request->created_at;
        $data->save ();
        return redirect()->back();
        //return response ()->json ( $data );
       //return response()->json(['message'=>'Successfully']);

    }
    public function update(Project $project, Request $request)
    {

       // echo $_GET['id'];
      // dd(Input::all());
         // $this->validate($request,$this->rules);
         $input=array_except(Input::all(),'_method');
         // $project->update($input);
    //     return Redirect::route('projects.show',$project->slug)->with('message','Project Updated Successfully');
         return response()->json(['message'=>'ow successfully']);
          //return redirect()->back();
     /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Project $project
     * @return Response
     */
}
    public function destroy(Project $project)
    {

          $project->delete();
        return Redirect::route('projects.index')->with('message','Project is Successfully Deleted');
    }
}