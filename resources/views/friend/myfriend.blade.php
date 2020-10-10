@extends('layouts.master')

@section('content')
<div>
        @forelse($add->where('user_id',Auth::id())->where('action',1) as $f)
        <div class="p-2">
                <div class="bg-white p-2">
                    <div class="row">
                            <div class="col-2">
        @forelse($user->where('id',$f->add_friend) as $name)
              @forelse($profile->where('user_id',$f->add_friend) as $image)
              <img src="{{asset('uploads/'.$image->image)}}" class="mr-3 mt-3 rounded-circle" style="width:32px;height:32px;" alt="404">
              @empty
              <img src="{{asset('uploads/profile.jpg')}}" class="mr-3 mt-3 rounded-circle" style="width:32px;height:32px;" alt="404">
              @endforelse
                            </div>
                            <div class="col-10">
<a href="{{url('friend/'.$name->id)}}" class="text-secondary"><h4 class="p-2"> {{$name->name}}</h4></a><br>
                            </div>
        @empty
        @endforelse
    </div>
</div>
</div>
   @empty
   @endforelse


<br>
   @forelse($add->where('add_friend',Auth::id())->where('action',1) as $f)
   <div class="p-2">
        <div class="bg-white p-2">
            <div class="row">
                    <div class="col-2">
   @forelse($user->where('id',$f->user_id) as $name)
         @forelse($profile->where('user_id',$f->user_id) as $image)
         <img src="{{asset('uploads/'.$image->image)}}" class="mr-3 mt-3 rounded-circle" style="width:32px;height:32px;" alt="404">
         @empty
         <img src="{{asset('uploads/profile.jpg')}}" class="mr-3 mt-3 rounded-circle" style="width:32px;height:32px;" alt="404">
         @endforelse
        </div>
        <div class="col-10">
         <a href="{{url('friend/'.$name->id)}}" class="text-secondary"> <h4 class="p-2">{{$name->name}}</h4></a><br>
        </div>
   @empty
   @endforelse
</div>
</div>
</div>
@empty
@endforelse

</div>

@endsection
