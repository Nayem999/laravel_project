@extends('layouts.master')

@section('content')

<div>
<div class="relative">
                @if($pro->cover)
                <img src="{{asset('uploads/'.$pro->cover)}}" class="img-fluid"  style="width:100%; height:300px;" alt="Responsive image">
                @else
                <img src="{{asset('uploads/cover.png')}}" class="img-fluid"  style="width:100%; height:300px;" alt="Responsive image">
                @endif
                <div class="absolute">
          @if($pro->image)
          <img src="{{asset('uploads/'.$pro->image)}}" class="mr-3 mt-3 rounded-circle" style="width:150px;height:150px;" alt="Responsive image">
          @else
          <img src="{{asset('uploads/profile.jpg')}}" class="mr-3 mt-3 rounded-circle" style="width:150px;height:150px;" alt="Responsive image">
          @endif        
                </div>
              </div>

<br>
<hr>
@if($pro->first_name)
<div class="row p-3"> 
        <div class="col-4">
        Name:
        </div>
        <div class="col-8">
        {{$pro->first_name}} {{$pro->last_name}}
            </div>
        </div>
@endif


@if($pro->phone)
<div class="row p-3"> 
        <div class="col-4">
        Phone:
        </div>
        <div class="col-8">
                {{$pro->phone}}
            </div>
</div>
@endif


@if($pro->birth)
<div class="row p-3"> 
        <div class="col-4">
        Birthday:
        </div>
        <div class="col-8">
                {{$pro->birth}}
            </div>
</div>
@endif


@if($pro->about)
<div class="row p-3"> 
        <div class="col-4">
        Gender:
        </div>
        <div class="col-8">
                {{$pro->about}}
            </div>
</div>
@endif


@if($pro->hobby)
<div class="row p-3"> 
        <div class="col-4">
        Hobby:
        </div>
        <div class="col-8">
                {{$pro->hobby}}
            </div>
</div>
@endif


@if($pro->twitter)
<div class="row p-3"> 
        <div class="col-4">
        Twitter:
        </div>
        <div class="col-8">
                {{$pro->twitter}}
            </div>
</div>

@endif

@if($pro->li)
<div class="row p-3"> 
        <div class="col-4">
        Linkin:
        </div>
        <div class="col-8">
                {{$pro->li}}
            </div>
</div>
@endif


@if($pro->ig)
<div class="row p-3"> 
        <div class="col-4">
        Instagram
        </div>
        <div class="col-8">
                {{$pro->ig}}
            </div>
</div>
@endif


@if($pro->fiverr)
<div class="row p-3"> 
        <div class="col-4">
        Fiverr
        </div>
        <div class="col-8">
                {{$pro->fiverr}}
            </div>
</div>
@endif

    <br>

                   
   <a class="btn btn-success" href="{{url('profile/'.Auth::id()."/edit")}}">Update Profile</a>
</div>


@endsection
