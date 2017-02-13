
<h2>Edit Project</h2>

    {!! Form::model($project, ['method' => 'PATCH', 'route' => ['projects.update', $project->slug]]) !!}
        @include('projects/partials/form', ['btn_text' => 'Update Project'])
    {!! Form::close() !!}
