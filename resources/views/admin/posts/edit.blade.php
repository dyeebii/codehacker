@extends('layouts.admin')

@section('content')
	<h1>Post by : {{$post->user->name}}</h1>
<div class="row">
<div class="col-sm-3">
	
	<img src="{{$post->photo ? '../../../'.$post->photo->path : 'http://placehold.it/400x400'}}" class="img-responsive img-rounded">
</div>
<div class="col-sm-9">
{!! Form::model($post,['method'=>'PATCH','action'=>['AdminPostsController@update',$post->id],'files'=>true]) !!}

	<diV class="form-group">	
	{!! Form::label('title','Title: ') !!}
	{!! Form::text('title',null,['class'=>'form-control']) !!}
	</diV>

	<diV class="form-group">	
	{!! Form::label('category_id','Category: ') !!}
	{!! Form::select('category_id',[''=>'Choose Options'] + $category,null,['class'=>'form-control']) !!}
	</diV>

	<diV class="form-group">	
	{!! Form::label('photo_id','Photo: ') !!}
	{!! Form::file('photo_id',null,['class'=>'form-control']) !!}
	</diV>

	<diV class="form-group">	
	{!! Form::label('body','Body: ') !!}
	{!! Form::textarea('body',null,['class'=>'form-control']) !!}
	</diV>
	
	<diV class="form-group">
	{!! Form::submit('Save Changes',['class'=>'btn btn-primary col-sm-6']) !!}
	</diV>

{!! Form::close() !!}
{!! Form::model($post,['method'=>'DELETE','action'=>['AdminPostsController@destroy',$post->id]]) !!}
<diV class="form-group">
	{!! Form::submit('Delete Post',['class'=>'btn btn-danger col-sm-6']) !!}
</diV>
{!! Form::close() !!}
</div>
</div>
@include('include.form_error')


@stop