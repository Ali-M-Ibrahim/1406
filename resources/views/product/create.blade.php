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
    <input  type="text" id="name" name="body_name" placeholder="Product name..">
    @error('body_name')
    <span>{{$message}}</span>
    @enderror
    <label for="description">Description</label>
    <textarea  type="text" id="description" name="body_description" placeholder="Product Description.."></textarea>
    @error('body_description')
    <span>{{$message}}</span>
    @enderror
    <label for="price">Price</label>
    <input  type="number" id="price" name="body_price" placeholder="Product Price" />
    @error('body_price')
    <span>{{$message}}</span>
    @enderror

    <label for="body_price_confirmation">Confirm Price</label>
{{--    <input  type="number" id="price2" name="body_price2" placeholder="Product Price confirmation" />--}}
        <input  type="number" id="price2" name="body_price_confirmation" placeholder="Product Price confirmation" />

    @error('body_price_confirmation')
    <span>{{$message}}</span>
    @enderror
    <label for="category">Category</label>
    <select  id="category" name="body_category">
        @foreach($categories as $category)
            <option value="{{$category->id}}">{{$category->name}}</option>
        @endforeach
    </select>

    <input type="submit" value="Submit">

    <a class="cancel" href="{{route('listProduct')}}">Cancel</a>
</form>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


</body>
</html>


