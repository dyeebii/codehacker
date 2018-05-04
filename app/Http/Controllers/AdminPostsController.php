<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PostsCreateRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Photo;
use App\Category;
use App\Post;
use App\Comment;
class AdminPostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $posts = Post::all();
        return view('admin.posts.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
         $category = Category::pluck('name','id')->all();
        return view('admin.posts.create',compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostsCreateRequest $request)
    {
        //
        $input = $request->all();


        $user = Auth::user();
        if($file = $request->file('photo_id')){
            $name = time().$file->getClientOriginalName();

            $file->move('images',$name);
            $photo=Photo::create(['path'=>$name]);

            $input['photo_id'] = $photo->id;
        }

        $user->posts()->create($input);

        return redirect('/admin/posts');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $post = Post::findOrFail($id);
        $category = Category::pluck('name','id')->all();
        return view('admin.posts.edit',compact('post','category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        Session::flash('deleted_user','The user has been deleted');
         $post = Post::findOrFail($id);
         $input = $request->all();
        if($file = $request->file('photo_id')){
            $name = time().$file->getClientOriginalName();

            $file->move('images',$name);
            $photo=Photo::create(['path'=>$name]);

            $input['photo_id'] = $photo->id;
        }

        $post->update($input);

        return redirect('/admin/posts');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
         $post = Post::findOrFail($id);

         unlink(public_path() . $post->photo->path);
        $post->delete();
        Session::flash('deleted_post','The post has been deleted');

        return redirect('admin/posts');
    }

    public function post($id){

        $post = Post::findOrFail($id);
        $comments = Comment::where('post_id',$post->id)->get();
        return view('post',compact('post','comments'));
    }
}
