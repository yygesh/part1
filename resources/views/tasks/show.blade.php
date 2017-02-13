
<h2>{{$task->name}} of {{$project->name}}
	
</h2>
<div>
	
	{{$task->description}}
</div>

<p>
	
	{!! link_to_route('projects.show', 'Back to Tasks', [$project->slug]) !!} |
        {!! link_to_route('projects.tasks.create', 'Create Task', $project->slug) !!}
</p>
