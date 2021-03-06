@extends('layouts.admin')


@section('content')
	<h1>Categories</h1>

	<div class="row">

		<div class="col-sm-12">
			
			{!! Form::model($category,['method'=>'PATCH','action'=>['AdminCategoriesController@update',$category->id],'files'=>true]) !!}

			<diV class="form-group">	
			{!! Form::label('name','Name: ') !!}
			{!! Form::text('name',null,['class'=>'form-control']) !!}
			</diV>
			<diV class="form-group">
			{!! Form::submit('Update Category',['class'=>'btn btn-primary col-sm-6']) !!}
			</diV>

			{!! Form::close() !!}

			{!! Form::model($category,['method'=>'DELETE','action'=>['AdminCategoriesController@destroy',$category->id],'files'=>true]) !!}
				<diV class="form-group">
			{!! Form::submit('Delete Category',['class'=>'btn btn-danger col-sm-6']) !!}
			</diV>
			{!! Form::close() !!}
		</div>

		
	</div>

@stop