@extends("layouts.app")
@section("content")
    <h1 class="text-3xl mb-5 border-b">Create</h1>
    <form action="{{route('product.save')}}" method="post">
        @csrf
        @method('post')
        <div class="my-1">
            <label for="name">Name</label>
            <input name="name" type="text" placeholder="name" class="border rounded p-3 py-1">
        </div>
        <div class="my-1">
            <label for="qty">Qty</label>
            <input name="qty" type="text" placeholder="qty" class="border rounded p-3 py-1">
        </div>
        <div class="my-1">
            <label for="price">Price</label>
            <input name="price" type="text" placeholder="price" class="border rounded p-3 py-1">
        </div>
        <div class="my-1">
            <label for="description">Description</label>
            <input name="description" type="text" placeholder="description" class="border rounded p-3 py-1">
        </div>
        <input type="submit" value="Save Product" class="bg-green-300 hover:bg-green-400 text-black font-bold py-2 px-4 rounded mt-2">
    </form>
@endsection
