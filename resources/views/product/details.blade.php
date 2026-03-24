<h1>Product Details</h1>

<ul>
    <li>Name: {{$product->name}}</li>
    <li>Description: {{$product->description}}</li>
    <li>Price: {{$product->price}}</li>
    <li>Category ID: {{$product->category_id}}</li>
    <li>Category Name: {{$product->getCategory->name}}</li>
</ul>

<a href="{{route('listProduct')}}">Back</a>
