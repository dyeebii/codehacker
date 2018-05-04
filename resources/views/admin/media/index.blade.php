@extends('layouts.admin')


@section('content')
	@section('content')
	@if(Session::has('deleted_photo'))
   <div class="alert alert-success">{{session('deleted_photo')}}
   </div>
  @endif
	<h1>Media</h1>

	<table class="table table-condensed">
	    <thead>
	      <tr>
	        <th>ID</th>
	        <th>Name</th>
	        <th>Created</th>
	        <th>Updated</th>
	        <th>Actions</th>
	      </tr>
	    </thead>
	    <tbody>
		    @if($photos)
		     @foreach($photos as $photo)	
		      <tr>
		        <td>{{$photo->id}}</td>
		        <td><img height = 50 width = 50 src="..{{$photo->path}}"></td>
		        <td>{{$photo->created_at->diffForHumans()}}</td>
		        <td>{{$photo->updated_at->diffForHumans()}}</td>
		        <td>
		        	{!! Form::model($photo,['method'=>'DELETE','action'=>['AdminMediaController@destroy',$photo->id],'files'=>true]) !!}
						<diV class="form-group">
							{!! Form::submit('Delete',['class'=>'btn btn-danger']) !!}
						</diV>
					{!! Form::close() !!}
		        </td>
		      </tr>
		      @endforeach
		     @endif
	    </tbody>
	</table>

@stop