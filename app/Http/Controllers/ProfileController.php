<?php

namespace App\Http\Controllers;

use App\Post;
use App\Profile;
use App\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\ImageManagerStatic as Image;

class ProfileController extends Controller
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
        $pro= Profile::where('user_id',Auth::id())->first();


        if($pro){
               $all=User::all();
            return view('profile.index',compact('pro','all'));
        }
        else
        {
                 $all=User::all();
            return view('profile.noprofile',compact('pro','all'));
        }
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('profile.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $p=New Profile();
        $p->user_id=Auth::id();
        $p->first_name=$request->first_name;
        $p->last_name=$request->last_name;
        $p->birth=$request->birth;
        $p->phone=$request->phone;
        $p->about=$request->about;
        $p->hobby=$request->hobby;
        $p->twitter=$request->twitter;
        $p->li=$request->li;
        $p->ig=$request->ig;
        $p->upwork=$request->upwork;
        $p->fiverr=$request->fiverr;

        if($request->file('cover')){
            $coverName = time() .".".rand(100,10000).".". $request->file('cover')->getClientOriginalExtension();
            $coverpath=base_path() . '/public/uploads/'. $coverName;
           $request->file('cover')->move(base_path() . '/public/uploads/', $coverName);
           Image::make($coverpath)->resize(800,null, function ($constraint) { $constraint->aspectRatio();})->save(null,60);
           $p->cover=$coverName;
        }
        if($request->file('image')){
           $imageName = time() .".". $request->file('image')->getClientOriginalExtension();
            $path=base_path() . '/public/uploads/'. $imageName;
           $request->file('image')->move(base_path() . '/public/uploads/', $imageName);
           Image::make($path)->resize(800,null, function ($constraint) { $constraint->aspectRatio();})->save(null,60);
           $p->image=$imageName;
        } 
       $p->save();
    return back();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
            
        
     
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pro=Profile::where('user_id',$id)->first();
        return view('profile.create',compact('pro'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $p=Profile::find($id);
        $p->first_name=$request->first_name;
        $p->last_name=$request->last_name;
        $p->birth=$request->birth;
        $p->phone=$request->phone;
        $p->about=$request->about;
        $p->hobby=$request->hobby;
        $p->twitter=$request->twitter;
        $p->li=$request->li;
        $p->ig=$request->ig;
        $p->upwork=$request->upwork;
        $p->fiverr=$request->fiverr;
if($request->file('cover')){
        $coverName = time() .".".rand(100,10000).".". $request->file('cover')->getClientOriginalExtension();
        $coverpath=base_path() . '/public/uploads/'. $coverName;
       $request->file('cover')->move(base_path() . '/public/uploads/', $coverName);
       Image::make($coverpath)->resize(800,null, function ($constraint) { $constraint->aspectRatio();})->save(null,60);
       $p->cover=$coverName;
    }
    if($request->file('image')){
       $imageName = time() .".". $request->file('image')->getClientOriginalExtension();
        $path=base_path() . '/public/uploads/'. $imageName;
       $request->file('image')->move(base_path() . '/public/uploads/', $imageName);
       Image::make($path)->resize(800,null, function ($constraint) { $constraint->aspectRatio();})->save(null,60);
       $p->image=$imageName;
    }      
     
       $p->save();
    return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profile $profile)
    {
        //
    }
}
