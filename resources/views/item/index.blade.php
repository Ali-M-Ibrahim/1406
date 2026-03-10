<!DOCTYPE html>
<html>
<head>
    <title>{{ $page_title }}</title>
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }
    </style>

</head>
<body>

<h1>{{ $page_title }}</h1>
<h3># of Items: {{ $number_items }}</h3>

@isset($average)
<h3>Average price is: {{$average}}</h3>
@endisset

<table>
    <tr>
        <th>Title</th>
        <th>Description</th>
        <th>Price</th>
        <th>Actions</th>
    </tr>

    @foreach($data as $row)
        <tr>
            <td> {{$row->title}}  </td>
            <td> {{$row->description}}  </td>
            <td> {{$row->price}}  </td>
            <td>
                <a href="/view-item/{{$row->id}}">View</a>
                <a href="{{route('viewItem',['id'=>$row->id])}}">View Recommended</a>
            </td>
        </tr>

    @endforeach

</table>



<p>Max Id : {{$maxId}}</p>
<p>Min Id : {{$minId}}</p>

<p style="position:fixed; bottom:0 "> {{$copyrights}}</p>

</body>
</html>

