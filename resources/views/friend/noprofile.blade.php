@extends('layouts.master')

@section('content')
<div>
<div class="relative">
        <img src="{{asset('uploads/cover.png')}}" class="img-fluid" style="width:100%; height:300px;" alt="Responsive image">

        <div class="absolute">
                <img src="{{asset('uploads/profile.jpg')}}" class="mr-3 mt-3 rounded-circle" style="width:150px;height:150px;" alt="Responsive image">

        </div>
      </div>


{{-- <img src="{{asset('uploads/cover.png')}}" class="img-fluid" style="width:100%; height:300px;" alt="Responsive image"> --}}
<br>
{{-- <img src="{{asset('uploads/profile.jpg')}}" class="mr-3 mt-3 rounded-circle" style="width:150px;height:150px;" alt="Responsive image"> --}}

<br>

    <br>

       <div class="row">
    <div class="col-4">
        Name:
        </div>
        <div class="col-8">
            {{$view->name}}
            </div>
    </div>

</div>

@endsection