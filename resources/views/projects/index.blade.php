@extends('app')
 
@section('content')
    <h2>Projects</h2>
 
    @if ( !$projects->count() )
        You have no projects
    @else

    
    
        <ul>
            @foreach( $projects as $project )
                <li>
                    {!! Form::open(['class' => 'form-inline', 'method' => 'DELETE', 'route' => ['projects.destroy', $project->slug]]) !!}
                        <a href="{{ route('projects.show', $project->slug) }}">{{ $project->name }}</a>
                        (	



                        {!! link_to_route('projects.show', 'View', array($project->slug), array('class' => 'btn btn-primary')) !!},
                            <button type="button" class="btn btn-info" id="{{$project->slug}}" onclick="editValue('{{ route('projects.show', $project->slug) }}','{{$project->id}}')">Edit</button>
                        
                            {!! Form::submit('Delete', array('class' => 'btn btn-danger')) !!}
                        )
                        <meta name="csrf-token" content="{{ csrf_token() }}" />
                    {!! Form::close() !!}
                </li>
              
            @endforeach
        </ul>
    @endif
 
    <p>
        {!! link_to_route('projects.create', 'Create Project') !!}
    </p>


     <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">
        
          
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Modal Header</h4>
            </div>
            <div class="modal-body">

         {!! Form::open(['method' => 'POST', 'action'=>'ProjectsController@route_define']) !!}
                @include('projects/partials/form', ['btn_text' => 'Update Project'])
                <input type="hidden" id="id" name="id">
                <input type="hidden" id="created_at" name="created_at">
                <input type="hidden" id="updated_at" name="updated_at">


            {!! Form::close() !!}
                {{ csrf_field() }}       
            

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>
          
        </div>
      </div>
 <script src="{{asset('bower_components/jquery/dist/jquery.min.js')}}"></script>
     
 <script type="text/javascript">
 function editValue(url,id){
   $.ajax({
               
                 url:url+'/edit',
                //url: url
                data:{'id':id},
                type:"GET",
                dataType:'html',
                success:function(data){
                    //alert(data);
      var objData = jQuery.parseJSON(data);
                    console.log(objData);
                  // alert(id);
                 $("#myModal").modal();
                 //alert("your Process is sucess");
                 $('#name').val(objData.name);
                 $('#id').val(objData.id);
                 $('#created_at').val(objData.created_at);
                 $('#updated_at').val(objData.updated_at);
              $('#slug').val(objData.slug);
               }
               
                });
   
 }
 function update(){
 //this function can't be used

        var base_url = 'http://localhost:8000';
           
            var name = $("input#name").val();
            var id = $("input#id").val();
            
            var slug = $("input#slug").val();
            var url='/projects/'+slug;
           //  alert(url);
            

            //alert(dataString);
            $.ajax({
                type: "PATCH",
                url :url,
                data : {'id':id},
                dataType:'html',
                success : function(data){
                    alert(data);
                    console.log(data);
                }
            },"html");
}
</script>

@endsection