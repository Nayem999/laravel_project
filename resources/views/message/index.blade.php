@extends('layouts.master')
@section('content')
@include('partials.formerrors')  
<div class="p-4">
<div class="text-light bg-dark" style="position:fixed;"> &nbsp; Friend Name: {{$user->name}}  &nbsp; </div><br><br>
@forelse ($mes as $mes)
@if($mes->user_id == Auth::id())
<div class="d-flex justify-content-end text-success">{{$mes->body}}<br></div>
@else
<div class="d-flex justify-content-start text-danger">{{$mes->body}}<br></div>
@endif
@empty
    
@endforelse
</div>
<div class="fixed-bottom d-flex justify-content-center">

{!! Form::open(['url'=>'message', 'method' => 'post']) !!}
{!! Form::hidden('id',$id) !!}
 {!!Form::textarea('message',null,['class'=>'form-control mr-3 mt-3','rows'=>1 ,'style'=>'border-radius: 12px; border-style: solid; border-color: hsl(89, 43%, 51%);'])!!}
 <br>
 {!!Form::submit('Message',['class'=>'form-control d-flex justify-content-center','style'=>'border-radius: 12px; border-style: solid; border-color: hsl(89, 43%, 51%);'])!!}
 {!! Form::close() !!}
 <br><br><br><br><br><br>
</div>
@endsection