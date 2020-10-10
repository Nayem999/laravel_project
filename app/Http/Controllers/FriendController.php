<?php

namespace App\Http\Controllers;

use App\Friend;
use App\Profile;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FriendController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      
        $m=User::all();
        $i=Profile::all();
        return view('friend.index',compact('m','i'));
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
        // $kk=Friend::where('user_id',Auth::id())->orWhere('add_friend',Auth::id())->where('user_id',$request->id)->orWhere('add_friend',$request->id)->count();
        $kk=Friend::where('user_id',Auth::id())->Where('add_friend',$request->id)->count();
        if($kk){
            return back();
        }
        else {
            $mmm=Friend::where('user_id',$request->id)->Where('add_friend',Auth::id())->count();
        if($mmm){
            return back();
        }else{
         $m=new Friend();
         $m->add_friend=$request->id;
         $m->user_id=Auth::id();
         $m->action=0;
         $m->save();
         return back();
        }
    }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Friend  $friend
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $view=User::find($id);
        $pro=Profile::where('user_id',$id)->first();

        if($pro){
    return view('friend.detail',compact('pro','view'));
    }else{
        return view('friend.noprofile',compact('view'));
    }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Friend  $friend
     * @return \Illuminate\Http\Response
     */
    public function edit(Friend $friend)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Friend  $friend
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $mm=Friend::find($id);
        $mm->action=1;
        $mm->save();
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Friend  $friend
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       Friend::destroy($id);
       return back();
    }
    public function add()
    {
        // $m=New User();
        $m=Friend::where('add_friend',Auth::id())->where('action',0)->get();
        $i=Profile::all();
        $k=User::all();
        // dd($m);
        return view('friend.wait',compact('m','i','k'));
    }
    public function myfriend()
    {
        $add=Friend::where('user_id',Auth::id())->orWhere('add_friend',Auth::id())->get();
        $user=User::all();
        $profile=Profile::all();
        return view('friend.myfriend',compact('add','profile','user'));
    }
}
