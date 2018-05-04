@extends('layouts.admin')


@section('content')
<h1>Edit User</h1>
<div class="row">
<div class="col-sm-3">
	
<img src="{{$user->photo ? '../../../'.$user->photo->path : 'http://placehold.it/400x400'}}" class="img-responsive img-rounded">
</div>
<div class="col-sm-9">
{!! Form::model($user,['method'=>'PATCH','action'=>['AdminUsersController@update',$user->id],'files'=>true]) !!}
<diV class="form-group">	
	{!! Form::label('name','Name: ') !!}
	{!! Form::text('name',null,['class'=>'form-control']) !!}
</diV>
<diV class="form-group">	
	{!! Form::label('email','Email: ') !!}
	{!! Form::email('email',null,['class'=>'form-control']) !!}
</diV>
<diV class="form-group">	
	{!! Form::label('role_id','Role: ') !!}
	{!! Form::select('role_id',[''=>'Choose Options'] + $roles,null,['class'=>'form-control']) !!}
</diV>
<diV class="form-group">	
	{!! Form::label('is_active','Status: ') !!}
	{!! Form::select('is_active',array(1=>'Active',0=>'Not Active'),null,['class'=>'form-control']) !!}
</diV>
<diV class="form-group">	
	{!! Form::label('photo_id','File: ') !!}
	{!! Form::file('photo_id',null,['class'=>'form-control']) !!}
</diV>
<diV class="form-group">	
	{!! Form::label('password','Password: ') !!}
	{!! Form::password('password',['class'=>'form-control']) !!}
</diV>

<diV class="form-group">
	{!! Form::submit('Save Changes',['class'=>'btn btn-primary col-sm-6']) !!}
</diV>

{!! Form::close() !!}

{!! Form::model($user,['method'=>'DELETE','action'=>['AdminUsersController@destroy',$user->id]]) !!}
<diV class="form-group">
	{!! Form::submit('Delete User',['class'=>'btn btn-danger col-sm-6']) !!}
</diV>
{!! Form::close() !!}
</div>	
</div>
<div class="row">
	@include('include.form_error')
</div>
@endsection