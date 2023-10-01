@extends("layouts.app")
@section("content")
<div>
    <h1>Edit</h1>
    <button>
        <a href="{{route('product.index')}}">home</a>
    </button>
    @include("partials.message")
    <form action="{{route('product.update',$product)}}" method="post">
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
</div>
@endsection