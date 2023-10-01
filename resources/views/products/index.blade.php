@extends("layouts.app")
@section("content")
    @if($products)
        <h1 class="text-3xl mb-5 border-b">Products</h1>
        <table class="w-full text-center">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Qty</th>
                    <th>Price</th>
                    <th>Description</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                <tr class="border">
                    <td class="py-5">{{$product->id}}</td>
                    <td class="py-5">{{$product->name}}</td>
                    <td class="py-5">{{$product->qty}}</td>
                    <td class="py-5">{{$product->price}}</td>
                    <td class="py-5">{{$product->description}}</td>
                    <td class="py-5">
                        <a
                            class="bg-gray-300 hover:bg-gray-400 text-black font-bold py-2 px-2 mr-1 rounded"
                            href="{{route('product.read', $product)}}"
                        >
                            View
                        </a>
                        <a
                            class="bg-gray-300 hover:bg-gray-400 text-black font-bold py-2 px-2 mr-1 rounded"
                            href="{{route('product.edit', $product)}}"
                        >
                            Edit
                        </a>
                        <form action="{{route('product.delete', $product)}}" method="post" class="inline">
                            @csrf
                            @method('delete')
                            <button type="submit" class="bg-red-500 hover:bg-red-700 text-black font-bold py-2 px-2 rounded">Delete</button>
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