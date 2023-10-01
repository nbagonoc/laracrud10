@extends("layouts.app")
@section("content")
    <h1 class="text-3xl mb-5 border-b">Create</h1>
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
        <input type="submit" value="Save a new product" class="bg-green-300 hover:bg-green-400 text-black font-bold py-2 px-4 rounded"">
    </form>
@endsection
