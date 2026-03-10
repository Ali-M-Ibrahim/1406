<!DOCTYPE html>
<html>
<head>
    <title>First page</title>
    <style>
        h1{
            color:red
        }
    </style>
</head>
<body>

@include('nav')

<h1>Hello Class, this is our first view</h1>

<ul>
    @for($i=0;$i<10;$i++)
            @if($i==3)
            @continue;
                <li>The number is 3</li>
             @break;
        @else
            <li>  {{ $i }}   </li>
            @endif
    @endfor
</ul>

<button onclick="clickMe();">Click me</button>


<script>
    function clickMe(){
        alert("clicked");
    }
</script>
</body>
</html>

