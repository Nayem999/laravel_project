<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Post;
use App\Profile;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\ImageManagerStatic as Image;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $post=Post::where('user_id',Auth::id())->with('user')->with('profile')->with('reaction')->with('comment')->orderby('created_at','desc')->get();
        $all=User::all();
        $com=Comment::orderby('created_at','desc')->get();
        // dd($post);
        return view('profile.mypost',compact('post','all','com'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $p=New Post();
        $p->user_id=Auth::id();
        $p->title=$request->title;
        $p->privacy=$request->privacy;
   
        if($request->file('photo')){
            $coverName = time() .".".rand(100,10000).".". $request->file('photo')->getClientOriginalExtension();
            $coverpath=base_path() . '/public/uploads/'. $coverName;
           $request->file('photo')->move(base_path() . '/public/uploads/', $coverName);
           Image::make($coverpath)->resize(800,null, function ($constraint) { $constraint->aspectRatio();})->save(null,60);
           $p->photo=$coverName;
        }
    //    $p->save();
       $profile=New Profile();
       $profile=Profile::where('user_id',Auth::id())->first();
       if($profile){
        $profile->post()->save($p);
       }
       $user=New User();
       $user=User::where('id',Auth::id())->first();
       $user->post()->save($p);
    return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
}
