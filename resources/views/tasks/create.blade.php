@extends('app')

@section('content')
<h1>Create Task For Project "{{$project->name}}"</h1>
	{!!Form::model(new App\Task,['route'=>['projects.tasks.store',$project->slug],'class'=>''])!!}
		@include('tasks.partials.form',['btn_text'=>'Create Task'])
	{!!Form::close()!!}

@endsection