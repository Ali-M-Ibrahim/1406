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

<h1>List Categories  <a href="{{route('category.create')}}" class="addbtn"> + </a> </h1>

<table>
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Number of Products</th>
        <th>Actions</th>
    </tr>

    @foreach($data as $row)
        <tr>
            <td>{{$row->id}}</td>
            <td>{{$row->name}}</td>
            <td>{{count($row->getProducts)}}</td>
            <td>
                <a href="{{route('category.show',['category'=>$row->id])}}">Details</a>
                <a href="{{route('category.edit',['category'=>$row->id])}}">Edit</a>
                <a href="{{route('deleteCategory',['id'=>$row->id])}}">Delete</a>

                <form action="{{route('category.destroy',['category'=>$row->id])}}" method="post">
                    @csrf
                    @method('delete')
                    <input type="submit" value="delete"/>
                </form>
            </td>

        </tr>
    @endforeach
</table>
