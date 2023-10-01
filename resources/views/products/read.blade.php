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
    <p>{{$product->name}}</p>
    <p>{{$product->qty}}</p>
    <p>{{$product->price}}</p>
    <p>{{$product->description}}</p>
</body>
</html>