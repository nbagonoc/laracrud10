<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Edit</h1>
    <button>
        <a href="{{route('product.index')}}">home</a>
    </button>
        @if($errors->any())
        <ul>
            @foreach($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
        </ul>
        @endif
    <form action="{{route('product.update',['id' => $product->id])}}" method="post">
        @csrf
        @method('put')
        <div>
            <label for="name">Name</label>
            <input  name="name" type="text" placeholder="name" value="{{$product->name}}">
        </div>
        <div>
            <label for="qty">Qty</label>
            <input name="qty" type="text" placeholder="qty" value="{{$product->qty}}">
        </div>
        <div>
            <label for="price">Price</label>
            <input name="price" type="text" placeholder="price" value="{{$product->price}}">
        </div>
        <div>
            <label for="description">Description</label>
            <input name="description" type="text" placeholder="description" value="{{$product->description}}">
        </div>
        <input type="submit" value="Update">
    </form>
</body>
</html>