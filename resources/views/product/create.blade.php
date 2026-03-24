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

<h2>Create New Product</h2>

<form action="{{route('saveProduct')}}" method="post" >
    @csrf
    <label for="name">Name</label>
    <input required type="text" id="name" name="body_name" placeholder="Product name..">

    <label for="description">Description</label>
    <textarea required type="text" id="description" name="body_description" placeholder="Product Description.."></textarea>

    <label for="price">Price</label>
    <input required type="number" id="price" name="body_price" placeholder="Product Price" />

    <label for="category">Category</label>
    <select required id="category" name="body_category">
        @foreach($categories as $category)
            <option value="{{$category->id}}">{{$category->name}}</option>
        @endforeach
    </select>

    <input type="submit" value="Submit">

    <a class="cancel" href="{{route('listProduct')}}">Cancel</a>
</form>

</body>
</html>


