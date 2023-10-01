<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Create</h1>
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
    <form action="{{route('product.save')}}" method="post">
        @csrf
        @method('post')
        <div>
            <label for="name">Name</label>
            <input  name="name" type="text" placeholder="name">
        </div>
        <div>
            <label for="qty">Qty</label>
            <input name="qty" type="text" placeholder="qty">
        </div>
        <div>
            <label for="price">Price</label>
            <input name="price" type="text" placeholder="price">
        </div>
        <div>
            <label for="description">Description</label>
            <input name="description" type="text" placeholder="description">
        </div>
        <input type="submit" value="Save a new product">
    </form>
</body>
</html>