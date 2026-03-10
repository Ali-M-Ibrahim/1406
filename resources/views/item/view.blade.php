<!DOCTYPE html>
<html>
<head>
    <title>View page</title>
</head>
<body>

<h1>{{$title}}</h1>

<ul>
    <li>The id of the item is:  {{$item->id}}</li>
    <li>The title of the item is:  {{$item->title}}</li>
    <li>The description of the item is:  {{$item->description}}</li>
    <li>The price of the item is:  {{$item->price}}</li>
    <li>The created date of the item is:  {{$item->created_at}}</li>
    <li>The updated date of the item is:  {{$item->updated_at}}</li>
</ul>


<p>Max Id : {{$maxId}}</p>
<p>Min Id : {{$minId}}</p>

<a href="{{Route('list-item')}}">Back</a>

<p style="position:fixed; bottom:0 "> {{$copyrights}}</p>


</body>
</html>

