@extends('layouts.admin')


@section('content')

	@if(Session::has('deleted_comment'))
   <div class="alert alert-success">{{session('deleted_comment')}}
   </div>
  @endif
	<h1>Comments</h1>
	<table class="table table-condensed">
    <thead>
      <tr>
        <th>ID</th>
        <th>Comment</th>
        <th>Email</th>
        <th>Replied by</th>
         <th>Reply</th>
        <th>Actions</th>
        <th></th>
        <th></th>
      </tr>
    </thead>
    <tbody>
    @if($replies)
     @foreach($replies as $reply)	
      <tr>
        <td>{{$reply->id}}</td>
        <td>{{$reply->comment->title}}</td>
        <td>{{$reply->email}}</td>
        <td>{{$reply->author}}</td>
        <td>{{$reply->body}}</td>
        <td><a href="{{route('home.post',$reply->comment->post->id)}}">View Post</a></td>
        <td>
        	@if($reply->is_active)
        		{!! Form::open(['method'=>'PATCH','action'=>['CommentRepliesController@update',$reply->id]]) !!}
	        		<input type="hidden" name="is_active" value = 0>
					<diV class="form-group">
						{!! Form::submit('Disapprove',['class'=>'btn btn-success']) !!}
					</diV>
				{!! Form::close() !!}
			@else
				{!! Form::open(['method'=>'PATCH','action'=>['CommentRepliesController@update',$reply->id]]) !!}
	        		<input type="hidden" name="is_active" value = 1>
					<diV class="form-group">
						{!! Form::submit('Approve',['class'=>'btn btn-info']) !!}
					</diV>
				{!! Form::close() !!}
        	@endif
        </td>
        <td>
        	{!! Form::open(['method'=>'DELETE','action'=>['CommentRepliesController@destroy',$reply->id]]) !!}
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