<!DOCTYPE html>
<html>
<style>
    form {
        border-radius: 5px;
        background-color: #f2f2f2;
        padding: 20px;
    }

    label {display: block;}

    input, textarea, select {
        width: 100%;
        padding: 12px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }

    input[type=submit] {
        width: 100%;
        background-color: #4CAF50;
        color: white;
        padding: 14px;
        margin: 8px 0;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    input[type=submit]:hover {
        background-color: #45a049;
    }

    .cancel{
        width: 90%;
        padding: 12px;

        background-color: gray;
        color: white;
        padding: 14px;
        margin: 8px 0;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        display: block;
        text-align: center;

    }
</style>
<body>

<h2>Edit Category</h2>

<form action="{{route('category.update',['category'=>$data->id])}}" method="post" >
    @csrf
    @method('put')
    <label for="name">Name</label>
    <input value="{{$data->name}}" required type="text" id="name" name="name" placeholder="Category name..">

    <input type="submit" value="Submit">

    <a class="cancel" href="{{route('category.index')}}">Cancel</a>
</form>

</body>
</html>


