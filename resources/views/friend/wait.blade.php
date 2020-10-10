@extends('layouts.master')

@section('content')

<div>

@forelse ($m as $all)
{{-- {{dd($all)}} --}}
<div class="p-2">
        <div class="bg-white p-2">
            <div class="row">
                <div class="col-2">
                        @forelse($i->where('user_id',$all->user_id) as $f)
                        <img src="{{asset('uploads/'.$f->image)}}" class="mr-3 mt-3 rounded-circle" style="width:40px;height:40px;" alt="Responsive image">
                        @empty
                        <img src="{{asset('uploads/profile.jpg')}}" class="mr-3 mt-3 rounded-circle" style="width:40px;height:40px;" alt="Responsive image">
                        @endforelse
                </div>
                <div class="col-6">
                   {{-- <h4 class="p-2">{{$all->name}}</h4>  --}}
                   @forelse($k->where('id',$all->user_id) as $user)
                   <h4 class="p-2">{{$user->name}}</h4>
                     @empty
                      @endforelse
                </div>
                <div class="col-2">
                        {!! Form::open(['url'=>'friend/'.$all->id, 'method' => 'put']) !!}
                        {{-- {!! Form::hidden('id',$all->id) !!} --}}
                        {!!Form::submit('Add Friend',['class'=>'btn btn-success'])!!}   
                        {!! Form::close() !!} 
                </div>
                <div class="col-2">
                        {!! Form::open(['url'=>'friend/'.$all->id, 'method' => 'delete']) !!}
                        {{-- {!! Form::hidden('id',$all->id) !!} --}}
                        {!!Form::submit('Delete',['class'=>'btn btn-danger'])!!}   
                        {!! Form::close() !!} 
                </div>
            </div>
        </div>
</div>
    
@empty
    
@endforelse


</div>

                   


@endsection
