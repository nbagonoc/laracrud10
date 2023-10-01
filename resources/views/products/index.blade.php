@extends("layouts.app")
@section("content")
<div>
    <h1>Products</h1>
    <button>
        <a href="{{route('product.create')}}">create product</a>
    </button>
    @include("partials.message")
    @if($products)
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
                    <tr>
                        <td>{{$product->id}}</td>
                        <td>{{$product->name}}</td>
                        <td>{{$product->qty}}</td>
                        <td>{{$product->price}}</td>
                        <td>{{$product->description}}</td>
                        <td>
                            <button>
                                <a href="{{route('product.read', $product)}}">View</a>
                            </button>
                        </td>
                        <td>
                            <button>
                                <a href="{{route('product.edit', $product)}}">Edit</a>
                            </button>
                        </td>
                        <td>
                            <form action="{{route('product.delete', $product)}}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
        </table>
    @else
    <h3>No products available</h3>
    @endif
</div>
@section("content")