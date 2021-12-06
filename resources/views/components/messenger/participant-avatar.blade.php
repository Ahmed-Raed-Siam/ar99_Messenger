@if($activeChat->participants->first()->avatar_url===null)
    <span class="avatar-text avatar-lg">
        {{ ucfirst(substr($activeChat->participants->first()->name,0,1)) }}
    </span>
@else
    <img class="avatar-img"
         src="{{ asset('uploads'.'/'.$activeChat->participants->first()) }}"
         alt="#">
@endif
