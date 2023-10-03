@props(['href' => '#'])

<a href="{{ $href }}" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-[11px] px-4 m-1 rounded">
    {{ $slot }}
</a>