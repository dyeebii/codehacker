@extends('layouts.admin')

@section('content')
	@if(Session::has('deleted_category'))
   <div class="alert alert-success">{{session('deleted_category')}}
   </div>
  @endif
	<h1>Categories</h1>

	<div class="row">

		<div class="col-sm-6">
			
			{!! Form::open(['method'=>'POST','action'=>'AdminCategoriesController@store','files'=>true]) !!}

			<diV class="form-group">	
			{!! Form::label('name','Name: ') !!}
			{!! Form::text('name',null,['class'=>'form-control']) !!}
			</diV>
			<diV class="form-group">
			{!! Form::submit('Create Category',['class'=>'btn btn-primary']) !!}
			</diV>

			{!! Form::close() !!}


		</div>

		<div class="col-sm-6">
			
			<table class="table table-condensed">
		    <thead>
		      <tr>
		        <th>ID</th>
		        <th>Name</th>
		        <th>Created</th>
		        <th>Updated</th>
		      </tr>
		    </thead>
		    <tbody>
			    @if($categories)
			     @foreach($categories as $category)	
			      <tr>
			        <td>{{$category->id}}</td>
			        <td><a href="{{route('categories.edit',$category->id)}}">{{$category->name}}</a></td>
			        <td>{{$category->created_at->diffForHumans()}}</td>
			        <td>{{$category->updated_at->diffForHumans()}}</td>
			      </tr>
			      @endforeach
			     @endif
		    </tbody>
			  </table>
		</div>
	</div>

@stop