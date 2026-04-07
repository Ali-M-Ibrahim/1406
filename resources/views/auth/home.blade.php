

@if(Auth::check())
    <h1>Hello {{Auth::user()->name}}</h1>

@else
<a href="{{route('login')}}">Please login</a>
@endif
