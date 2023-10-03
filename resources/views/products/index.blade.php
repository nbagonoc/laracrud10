@extends("layouts.app")
@section("content")
    @if($products)
        <h1 class="text-3xl mb-5 border-b">Products</h1>
        <table class="w-full text-center">
            <thead>
                <tr>
                    <th class="pb-5">ID</th>
                    <th class="pb-5">Name</th>
                    <th class="pb-5">Qty</th>
                    <th class="pb-5">Price</th>
                    <th class="pb-5">Description</th>
                    <th class="pb-5">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                <tr class="border-t">
                    <td class="py-5">{{$product->id}}</td>
                    <td class="py-5">{{$product->name}}</td>
                    <td class="py-5">{{$product->qty}}</td>
                    <td class="py-5">{{$product->price}}</td>
                    <td class="py-5">{{$product->description}}</td>
                    <td class="py-5">
                        <x-button href="{{route('product.read', $product)}}">View</x-button>
                        <x-button href="{{route('product.edit', $product)}}">Edit</x-button>
                        <form action="{{route('product.delete', $product)}}" method="post" class="inline">
                            @csrf
                            @method('delete')
                            <x-button-danger>Delete</x-button-danger>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>            
        </table>
    @else
    <h3>No products available</h3>
    @endif
@endsection