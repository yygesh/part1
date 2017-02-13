@extends('app')
 
@section('content')
    <h2>Tasks</h2>
 
    @if ( !$project->tasks->count() )
        Your project has no tasks.
    @else
        <ul>
            @foreach( $project->tasks as $task )
                <li>
                    {!! Form::open(array('class' => 'form-inline', 'method' => 'DELETE', 'route' => array('projects.tasks.destroy', $project->slug, $task->slug))) !!}
                        <a href="{{ route('projects.tasks.show', [$project->slug, $task->slug]) }}">{{ $task->name }}</a>
                        (
                        	{!! link_to_route('projects.tasks.show', 'View', array($project->slug, $task->slug), array('class' => 'btn btn-primary','data-toggle'=>'modal', 'data-target'=>'#'.$task->slug)) !!},
 
                            {!! link_to_route('projects.tasks.edit', 'Edit', array($project->slug, $task->slug), array('class' => 'btn btn-info','data-toggle'=>'modal', 'data-target'=>'#'.$task->slug)) !!},
 
                            {!! Form::submit('Delete', array('class' => 'btn btn-danger')) !!}
                        )
                    {!! Form::close() !!}
                </li>
                <div id='{{$task->slug}}' class="modal fade" role="dialog">
                  <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">

                     
                      
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      </div>

                  </div>
                </div>
            @endforeach
        </ul>
    @endif
 
    <p>
        {!! link_to_route('projects.index', 'Back to Projects') !!} |
        {!! link_to_route('projects.tasks.create', 'Create Task', $project->slug) !!}
    </p>
    @endsection

    
