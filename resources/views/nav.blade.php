<div class="topnav">
    <a class="active" href="#home">Home</a>
    <a href="#news">News</a>
    @if(Auth::check())
    <a href="#contact">Welcome {{Auth::user()->email}}</a>
    <a href="{{route('logout')}}">Logout</a>
    @endif
</div>
