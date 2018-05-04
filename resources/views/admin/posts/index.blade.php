@extends('layouts.admin')

@section('content')
@if(Session::has('deleted_post'))
   <div class="alert alert-success">{{session('deleted_post')}}
   </div>
  @endif
	<h1>Posts</h1>
	<table class="table table-condensed">
    <thead>
      <tr>
        <th>ID</th>
        <th>Owner</th>
        <th>Category</th>
        <th>Photo</th>
         <th>Title</th>
        <th>Actions</th>
        <th></th>
        <th>Created</th>
        <th>Updated</th>
      </tr>
    </thead>
    <tbody>
    @if($posts)
     @foreach($posts as $post)	
      <tr>
        <td>{{$post->id}}</td>
        <td><a href="{{route('posts.edit',$post->id)}}">{{$post->user->name}}</a></td>
        <td>{{$post->category->name}}</td>
        <td><img height = 50 width = 50 src="{{$post->photo ? '..'.$post->photo->path : 'http://placehold.it/50x50'}}"></td>
        <td>{{$post->title}}</td>
        <td><a href="{{route('home.post',$post->id)}}">View post</a></td>
        <td><a href="{{route('comments.show',$post->id)}}">View Comments</a></td>
        <td>{{$post->created_at->diffForHumans()}}</td>
        <td>{{$post->updated_at->diffForHumans()}}</td>
      </tr>
      @endforeach
     @endif
    </tbody>
  </table>
@stop