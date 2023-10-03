<div class="navigation mb-5">
    <x-button href="{{route('product.index')}}">
        Home
    </x-button>
    @unless(Route::is('product.create'))
        <x-button href="{{route('product.create')}}">
            Create
        </x-button>
    @endunless
</div>