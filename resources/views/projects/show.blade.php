@extends('app')

@section('content')
<h1>{{$project->name}}</h1>

@if(!$project->tasks->count())

you don't have any task
@else

<ul>
	@foreach($project->tasks as $task)

	<li><a href="{{route('projects.tasks.show',[$project->slug, $task->slug])}}">{{$task->name}}</a></li>
	@endforeach
</ul>
@endif
@stop