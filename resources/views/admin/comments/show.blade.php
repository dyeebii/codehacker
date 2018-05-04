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
        <th>Post</th>
        <th>Email</th>
        <th>Comment by</th>
         <th>Comment</th>
        <th>Actions</th>
        <th></th>
        <th></th>
      </tr>
    </thead>
    <tbody>
        @if($comments)
         @foreach($comments as $comment)
         <tr>
          <td>{{$comment->id}}</td>
          <td>{{$comment->post->title}}</td>
          <td>{{$comment->email}}</td>
          <td>{{$comment->author}}</td>
          <td>{{$comment->body}}</td>
          <td><a href="{{route('home.post',$comment->post->id)}}">View Post</a></td>
          <td>
            @if($comment->is_active)
              {!! Form::open(['method'=>'PATCH','action'=>['PostCommentsController@update',$comment->id]]) !!}
                <input type="hidden" name="is_active" value = 0>
            <diV class="form-group">
              {!! Form::submit('Disapprove',['class'=>'btn btn-success']) !!}
            </diV>
          {!! Form::close() !!}
        @else
          {!! Form::open(['method'=>'PATCH','action'=>['PostCommentsController@update',$comment->id]]) !!}
                <input type="hidden" name="is_active" value = 1>
            <diV class="form-group">
              {!! Form::submit('Approve',['class'=>'btn btn-info']) !!}
            </diV>
          {!! Form::close() !!}
            @endif
          </td>
          <td>
            {!! Form::open(['method'=>'DELETE','action'=>['PostCommentsController@destroy',$comment->id]]) !!}
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