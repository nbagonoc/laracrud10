@extends("layouts.app")
@section("content")
    <button class="bg-green-300 hover:bg-green-400 text-black font-bold py-2 px-4 rounded">
        <a href="{{route('product.create')}}">create product</a>
    </button>
    @include("partials.message")
    @if($products)
        <h1>Products</h1>
        <table>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Qty</th>
                <th>Price</th>
                <th>Description</th>
                <th>Action</th>
            </tr>
                @foreach($products as $product)
                    <tr class="border">
                        <td>{{$product->id}}</td>
                        <td>{{$product->name}}</td>
                        <td>{{$product->qty}}</td>
                        <td>{{$product->price}}</td>
                        <td>{{$product->description}}</td>
                        <td>
                            <button class="bg-gray-300 hover:bg-gray-400 text-black font-bold py-2 px-4 rounded">
                                <a href="{{route('product.read', $product)}}">View</a>
                            </button>
                            <button class="bg-gray-300 hover:bg-gray-400 text-black font-bold py-2 px-4 rounded">
                                <a href="{{route('product.edit', $product)}}">Edit</a>
                            </button>
                            <form action="{{route('product.delete', $product)}}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="bg-red-500 hover:bg-red-700 text-black font-bold py-2 px-4 rounded">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
        </table>
    @else
    <h3>No products available</h3>
    @endif
@endsection