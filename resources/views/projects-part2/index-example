@extends('app')

@section('content')
<h1>Projects</h1>

@if(!$projects->count())

you have no projects.
@else
<u>
@foreach($projects as $project)
	<li><a href="{{route('projects.show',$project->slug)}}">{{$project->name}}</a></li>
@endforeach
</u>
@endif;


@stop