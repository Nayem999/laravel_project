<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;
use App\Post;
use App\User;
use App\Profile;
use App\Reaction;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $post=Post::where('privacy','1')->with('user')->with('profile')->with('reaction')->orderby('created_at','desc')->get();
        $all=User::all();
        $com=Comment::orderby('created_at','desc')->get();
        // dd($post);
        return view('home',compact('post','all','com'));
    }
}
