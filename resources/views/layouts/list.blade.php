<div class="container">
    Messenger
<div class="panel panel-info"></div>
<div class="panel-heading">
<div class="panel-body">

    @forelse($add->where('user_id',Auth::id())->where('action',1) as $f)
          @forelse($user->where('id',$f->add_friend) as $name)
                @forelse($profile->where('user_id',$f->add_friend) as $image)
                <img src="{{asset('public/uploads/'.$image->image)}}" class="mr-3 mt-3 rounded-circle" style="width:32px;height:32px;" alt="404">
                @empty
                <img src="{{asset('public/uploads/profile.jpg')}}" class="mr-3 mt-3 rounded-circle" style="width:32px;height:32px;" alt="404">
                @endforelse
<a href="{{url('message/'.$name->id)}}" class="text-secondary"> {{$name->name}}</a><br>
          @empty
          @endforelse
     @empty
     @endforelse
<br>
     @forelse($add->where('add_friend',Auth::id())->where('action',1) as $f)
     @forelse($user->where('id',$f->user_id) as $name)
           @forelse($profile->where('user_id',$f->user_id) as $image)
           <img src="{{asset('public/uploads/'.$image->image)}}" class="mr-3 mt-3 rounded-circle" style="width:32px;height:32px;" alt="404">
           @empty
           <img src="{{asset('public/uploads/profile.jpg')}}" class="mr-3 mt-3 rounded-circle" style="width:32px;height:32px;" alt="404">
           @endforelse
           <a href="{{url('message/'.$name->id)}}" class="text-secondary"> {{$name->name}}</a><br>
     @empty
     @endforelse
@empty
@endforelse

</div>
</div>
</div>
</div>