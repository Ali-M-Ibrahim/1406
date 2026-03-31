<!DOCTYPE html>
<html>
<head>
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
        .addbtn{
            font-size: 30px;
        }
    </style>

</head>
<body>

<h1> List of Images  <a href="{{Route('addImage')}}">Create</a> </h1>

<table>
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Image</th>

    </tr>

    @foreach($images as $row)
        <tr>
            <td>{{$row->id}}</td>
            <td>{{$row->filename}}</td>
            <td>  <img width="200" src="{{asset($row->path)}}" /> </td>
        </tr>
    @endforeach
</table>
