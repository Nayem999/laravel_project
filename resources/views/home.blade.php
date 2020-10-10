@extends('layouts.master')
@section('content')
@include('partials.formerrors')                
   <!-- Trigger the modal with a button -->
   <div class="bg-white p-2 d-flex justify-content-center">
   <button type="button" class="btn table-bordered " data-toggle="modal" data-target="#myModal">
       <input type="text" class="form-control" name="" id="" placeholder="What's is your mind?"><br>
       <input type="file" class="form-control" name="" id="">
    </button>
  </div>
   <!-- Modal -->
   <div class="modal fade" id="myModal" role="dialog">
     <div class="modal-dialog modal-lg">
       <div class="modal-content">
         <div class="modal-header">
           <button type="button" class="close" data-dismiss="modal">&times;</button>
           {{-- <h4 class="modal-title">Modal Header</h4> --}} 
         </div>
         <div class="modal-body">
           {{-- <p>This is a large modal.</p> --}}
           {!!Form::open(['url'=>'post','method'=>'post','enctype'=>'multipart/form-data']) !!}
           {!! Form::label('title', 'Post', ['class'=>'awesome']) !!}
           {!! Form::text('title','', ['rol'=>'3','col'=>'10', 'class'=>'form-control']) !!}
           @error('title')
           <div class="alert alert-dark">Check your post</div>
           @enderror
           <br>
           {!! Form::label('privacy','Privacy') !!}
            {!! Form::select('privacy', ['1'=>'Public','2'=>'Friends','3'=>'Onlyme'], null,
            array('class'=>'form-control')) !!}
            @error('privacy')
            <div class="alert alert-dark">Check your privacy</div>
            @enderror
            <br>
           <div class="form-group">
            {!! Form::label('photo','Photo') !!}
            {!! Form::file('photo', null, ['class' => 'form-control']) !!}
            </div>
            @error('image')
            <div class="alert alert-dark">Check your Photo</div>
            @enderror
            <br>
            {!!Form::submit('Submit')!!}
           {!!Form::Close()!!}
         </div>
         <div class="modal-footer">
           <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
         </div>
       </div>
     </div>
   </div>
<br>
{{-- @for($i=0; $i<$post->count(); $i++) --}}
   @foreach($post as $post)
   <div class="p-2">
   <div class="bg-white p-2">
<div class="row">
  <div class="col-1">
      @forelse ($post->profile as $p)
           @if($p->image)
      <img src="{{asset('public/uploads/'.$p->image)}}" class="mr-3 mt-3 rounded-circle" style="width:32px;height:32px;" alt="Responsive image">
      @endif
           @empty
      <img src="{{asset('public/uploads/profile.jpg')}}" class="mr-3 mt-3 rounded-circle" style="width:32px;height:32px;" alt="Responsive image">
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
<img src="{{asset('public/uploads/'.$post->photo)}}" class="img-fluid "  style="width:100%; height:300px;" alt="Responsive image">
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
