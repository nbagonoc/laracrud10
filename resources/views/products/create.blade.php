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
        <x-button-success>Save</x-button-success>
        <x-button href="{{route('product.index')}}">Cancel</x-button>
    </form>
@endsection
