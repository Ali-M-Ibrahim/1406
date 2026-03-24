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

<h1>List Product  <a href="{{route('createProduct')}}" class="addbtn"> + </a> </h1>

<table>
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Category</th>
        <th>Actions</th>
    </tr>

    @foreach($data as $row)
        <tr>
            <td>{{$row->id}}</td>
            <td>{{$row->name}}</td>
            <td>{{$row->getCategory->name}}</td>
            <td>

                <a href="{{route('viewProduct',['id'=>$row->id])}}">Details</a>
                <a href="{{route('editProduct',['id'=>$row->id])}}">Edit</a>
                <a href="{{route('deleteProduct2',['id'=>$row->id])}}">Delete</a>


                <form action="{{route('deleteProduct',['id'=>$row->id])}}" method="post">
                    @csrf
                    @method('delete')
                    <input type="submit" value="delete"/>
                </form>

            </td>
        </tr>
    @endforeach


</table>



</body>
</html>

