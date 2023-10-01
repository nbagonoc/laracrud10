@extends("layouts.app")
@section("content")
    <h1>Edit</h1>
    <button>
        <a href="{{route('product.index')}}">home</a>
    </button>
    <p>{{$product->name}}</p>
    <p>{{$product->qty}}</p>
    <p>{{$product->price}}</p>
    <p>{{$product->description}}</p>
@endsection