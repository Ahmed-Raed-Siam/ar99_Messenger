@if(\Illuminate\Support\Facades\Auth::user()->avatar_url==null)
    <span class="avatar-text avatar-lg">
        {{ ucfirst(substr(\Illuminate\Support\Facades\Auth::user()->name,0,1)) }}
    </span>
@else
    <img class="avatar-img"
         src="{{ asset('uploads'.'/'.\Illuminate\Support\Facades\Auth::user()->avatar_url) }}"
         alt="">
@endif
