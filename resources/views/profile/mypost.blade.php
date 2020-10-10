@extends('layouts.master')
@section('content')
@include('partials.formerrors')                

   @foreach($post as $post)
   <div class="p-2">
   <div class="bg-white p-2">
<div class="row">
  <div class="col-1">
      @forelse ($post->profile as $p)
           @if($p->image)
      <img src="{{asset('uploads/'.$p->image)}}" class="mr-3 mt-3 rounded-circle" style="width:32px;height:32px;" alt="Responsive image">
      @endif
           @empty
      <img src="{{asset('uploads/profile.jpg')}}" class="mr-3 mt-3 rounded-circle" style="width:32px;height:32px;" alt="Responsive image">
      @endforelse
  </div>
  <div class="col-11">
      @forelse ($post->user as $p)
      {{$p->name}}
      @empty
      no name
      @endforelse
<br>
{{-- Post Created At: {{date('F d, Y',strtotime($post->created_at))}} at {{date('g:ia',strtotime($post->created_at))}} --}}
Post Created At: {{$post->created_at->diffForHumans()}}
  </div>
</div>
<hr>
<br>
@if($post->title)
{{$post->title}}
@endif
<br><br>
@if($post->photo)
<img src="{{asset('uploads/'.$post->photo)}}" class="img-fluid "  style="width:100%; height:300px;" alt="Responsive image">
@endif
<br>
<div class="row p-3">
  <div class="col-6 border btn border-success d-flex justify-content-center">
  <button type="button" class="btn btn-success btn-circle">
{{count($post->reaction->where('reaction',1))}}
</button>
  {!! Form::open(['route'=>'photolike', 'method' => 'post']) !!}
{!! Form::hidden('id',$post->id) !!}
{!!Form::submit('Like')!!} 
{!! Form::close() !!} 
</div>
  <div class="col-6 border btn border-success d-flex justify-content-center">
  <button type="button" class="btn btn-danger btn-circle">
    {{count($post->reaction->where('reaction',0))}}
  </button>
  {!! Form::open(['route'=>'photodislike', 'method' => 'post']) !!}
{!! Form::hidden('id',$post->id) !!}
{!!Form::submit('Dislike')!!}   
{!! Form::close() !!} 
</div>
</div>

{{-- <h4>Comment :</h4> --}}
{!! Form::open(['url'=>'comment', 'method' => 'post']) !!}
{!! Form::hidden('id',$post->id) !!}
{!!Form::textarea('comment',null,['class'=>'form-control mr-3 mt-3','rows'=>1,'style'=>'border-radius: 12px'])!!}
<br>
{!!Form::submit('Comment',['class'=>'form-control d-flex justify-content-center'])!!}
{!! Form::close() !!}

<div style="max-height:200px;overflow:auto;">
    @forelse($com->where('post_id',$post->id) as $c)
    <div class="row">
    <div class="col-3">
    @forelse($all->where('id',$c->user_id) as $f)
  <p> {{$f->name}}</p>
  @empty
  @endforelse
  </div>
  <div class="col-9">
  <p> {{$c->body}} <br>{{$c->created_at->diffForHumans()}}</p>
  </div>
  </div>
  @empty
  @endforelse
</div>

</div>
</div>
   @endforeach

@endsection
