@extends('layouts.admin')

@section('content')
	
	<h1>Users</h1>
	<div class="container">          
  <table class="table table-condensed">
    <thead>
      <tr>
        <th>ID</th>
        <th>Photo</th>
        <th>Name</th>
        <th>Email</th>
         <th>Role</th>
         <th>Status</th>
        <th>Created</th>
        <th>Updated</th>
      </tr>
    </thead>
    <tbody>
    @if($users)
     @foreach($users as $user)	
      <tr>
        <td>{{$user->id}}</td>
        <td><img height = 50 width = 50 src="{{$user->photo ? $user->photo->path : 'http://placehold.it/50x50'}}"></td>
        <td><a href="{{route('users.edit',$user->id)}}">{{$user->name}}</a></td>
        <td>{{$user->email}}</td>
        <td>{{$user->role ? $user->role->name : 'User has no role'}}</td>
        <td>{{$user->is_active?"Active":"Offline"}}</td>
        <td>{{$user->created_at->diffForHumans()}}</td>
        <td>{{$user->updated_at->diffForHumans()}}</td>
      </tr>
      @endforeach
     @endif
    </tbody>
  </table>
</div>
@endsection