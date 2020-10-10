<?php

namespace App\Http\Controllers;

use App\Reaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReactionController extends Controller
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
        //
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Reaction  $reaction
     * @return \Illuminate\Http\Response
     */
    public function show(Reaction $reaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Reaction  $reaction
     * @return \Illuminate\Http\Response
     */
    public function edit(Reaction $reaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Reaction  $reaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reaction $reaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Reaction  $reaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reaction $reaction)
    {
        //
    }
    public function like(Request $request)
    {
        // dd($request->id);
            // $id=Auth::id();
            $kk=Reaction::where('post_id',$request->id)->where('user_id',Auth::id())->where('reaction','1')->count();
            if($kk){
                return back()->with('mes','Already given your opinion');
            }
            else {
                $pp=Reaction::where('post_id',$request->id)->where('user_id',Auth::id())->where('reaction','0')->count();
                if($pp){
                    $m=Reaction::where('post_id',$request->id)->where('user_id',Auth::id())->first();
                    $m->reaction=1;
                    $m->save();
                    return back();
                }else{
        $m=new Reaction();
        // dd($request->id);
        $m->post_id=$request->id;
        $m->reaction=1;
        $m->user_id=Auth::id();
        $m->save();
        return back();
    }
        }
      
    }
     // Reaction for dislike
    public function dislike(Request $request)
    {
            // $id=Auth::id();
            $kk=Reaction::where('post_id',$request->id)->where('user_id',Auth::id())->where('reaction','0')->count();
            if($kk){
                return back()->with('mes','Already given your opinion');
            }
            else {
                $pp=Reaction::where('post_id',$request->id)->where('user_id',Auth::id())->where('reaction','1')->count();
                if($pp){
                    $m=Reaction::where('post_id',$request->id)->where('user_id',Auth::id())->first();
                    $m->reaction=0;
                    $m->save();
                    return back();
                }else{
        $m=new Reaction();
        // dd($request->id);
        $m->post_id=$request->id;
        $m->reaction=0;
        $m->user_id=Auth::id();
        $m->save();
        return back();
    }
            }

    }
}
