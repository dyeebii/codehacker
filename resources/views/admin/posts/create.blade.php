@extends('layouts.admin')

@section('content')
	<h1>Create Post</h1>


{!! Form::open(['method'=>'POST','action'=>'AdminPostsController@store','files'=>true]) !!}

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
	{!! Form::submit('Post',['class'=>'btn btn-primary']) !!}
	</diV>

{!! Form::close() !!}


@include('include.form_error')


@stop