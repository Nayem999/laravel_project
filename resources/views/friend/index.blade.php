@extends('layouts.master')

@section('content')

<div>

@forelse ($m->whereNotIn('id',Auth::id()) as $all)

<div class="p-2">
        <div class="bg-white p-2">
            <div class="row">
                <div class="col-2">
                        @forelse($i->where('user_id',$all->id) as $f)
                        <img src="{{asset('uploads/'.$f->image)}}" class="mr-3 mt-3 rounded-circle" style="width:40px;height:40px;" alt="Responsive image">
                        @empty
                        <img src="{{asset('uploads/profile.jpg')}}" class="mr-3 mt-3 rounded-circle" style="width:40px;height:40px;" alt="Responsive image">
                        @endforelse
                </div>
                <div class="col-7">
                <a href="{{url('friend/'.$all->id)}}"><h4 class="p-2">{{$all->name}}</h4> </a> 
                </div>
                <div class="col-3">
                        {!! Form::open(['url'=>'friend', 'method' => 'post']) !!}
                        {!! Form::hidden('id',$all->id) !!}
                        {!!Form::submit('Add Friend',['class'=>'btn btn-success'])!!}   
                        {!! Form::close() !!} 
                </div>
            </div>
        </div>
</div>
    
@empty
    
@endforelse


</div>

                   


@endsection
