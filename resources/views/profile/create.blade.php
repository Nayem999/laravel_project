@extends('layouts.master')

@section('content')

@include('partials.formerrors')
{{-- {!! Form::open(['url'=>'profile', 'method' => 'post','enctype'=>'multipart/form-data']) !!} --}}
@if($pro)
{!! Form::model($pro,['route'=>['profile.update', $pro->id], 'method' => 'PATCH','enctype'=>'multipart/form-data']) !!}
@else
{!! Form::open(['url'=>'profile', 'method' => 'post','enctype'=>'multipart/form-data']) !!}
@endif
{!!Form::label('first_name','First Name',['class'=>'awesome'])!!}
{!!Form::text('first_name',null,['class'=>'form-control'])!!}
@error('first_name')
<div class="alert alert-dark">Check your First Name</div>
@enderror

{!!Form::label('last_name','Last Name',['class'=>'awesome'])!!}
{!!Form::text('last_name',null,['class'=>'form-control'])!!}
@error('last_name')
<div class="alert alert-dark">Check your Last Name</div>
@enderror

{!!Form::label('birth','Birth Date',['class'=>'awesome'])!!}
{!!Form::date('birth',null,['class'=>'form-control'])!!}
@error('birth')
<div class="alert alert-dark">Check your Birth Date</div>
@enderror

{!!Form::label('phone','Phone Number',['class'=>'awesome'])!!}
{!!Form::text('phone',null,['class'=>'form-control'])!!}
@error('phone')
<div class="alert alert-dark">Check your Phone Number</div>
@enderror

<br>
{!!Form::label('about','Gender',['class'=>'awesome'])!!} &nbsp;&nbsp;
{{-- {!!Form::text('about',null,['class'=>'form-control'])!!} --}}
{!! Form::radio('about','Male', false ) !!} Male &nbsp;
{!! Form::radio('about','Female', false) !!} Female
@error('about')
<div class="alert alert-dark">Check your self</div>
@enderror
<br>
{!!Form::label('hobby','Hobby',['class'=>'awesome'])!!}
{!!Form::text('hobby',null,['class'=>'form-control'])!!}
@error('hobby')
<div class="alert alert-dark">Check your Hobby</div>
@enderror
<br>
{!!Form::label('cover','Cover Photo',['class'=>'awesome'])!!}
{!!Form::file('cover',null,['class'=>'form-control'])!!}
@error('cover')
<div class="alert alert-dark">Check Cover Photo</div>
@enderror

<div class="form-group">
{!! Form::label('image','My Photo') !!}
{!! Form::file('image', null, ['class' => 'form-control']) !!}
</div>
@error('image')
<div class="alert alert-dark">Check your My Photo</div>
@enderror

{!!Form::label('twitter','Twitter',['class'=>'awesome'])!!}
{!!Form::text('twitter',null,['class'=>'form-control'])!!}
@error('twitter')
<div class="alert alert-dark">Check your Twitter</div>
@enderror

{!!Form::label('li','Linkin',['class'=>'awesome'])!!}
{!!Form::text('li',null,['class'=>'form-control'])!!}
@error('li')
<div class="alert alert-dark">Check your Linkin</div>
@enderror

{!!Form::label('ig','Instragrame',['class'=>'awesome'])!!}
{!!Form::text('ig',null,['class'=>'form-control'])!!}
@error('ig')
<div class="alert alert-dark">Check your Instragrame</div>
@enderror

{!!Form::label('upwork','Upwork',['class'=>'awesome'])!!}
{!!Form::text('upwork',null,['class'=>'form-control'])!!}
@error('upwork')
<div class="alert alert-dark">Check your Upwork</div>
@enderror

{!!Form::label('fiverr','Fiverr',['class'=>'awesome'])!!}
{!!Form::text('fiverr',null,['class'=>'form-control'])!!}
@error('fiverr')
<div class="alert alert-dark">Check your Fiverr</div>
@enderror


<br>
{!!Form::submit('Submit')!!}

{!! Form::close() !!}


@endsection
