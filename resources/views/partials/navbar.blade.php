<div class="navigation mb-5">
    <a class="bg-gray-300 hover:bg-gray-400 text-black font-bold py-2 px-4 rounded" href="{{route('product.index')}}">Home</a>
    @unless(Route::is('product.create'))
        <a class="bg-green-300 hover:bg-green-400 text-black font-bold py-2 px-4 rounded" href="{{route('product.create')}}">Create</a>
    @endunless
</div>