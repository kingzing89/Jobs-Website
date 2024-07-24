@props(['href' => null])

@if($href)
    <a href="{{ $href }}" {{ $attributes->merge(['class' => 'inline-flex items-center justify-center rounded-md border border-black shadow-sm px-12 py-1 font-medium focus:outline-none focus:ring-2 focus:ring-offset-2 text-red-500 mt-2 mb-2']) }}>
        {{ $slot }}
    </a>
@else
    <button {{ $attributes->merge(['class' => 'inline-flex items-center justify-center rounded-md border border-black shadow-sm px-4 py-2 font-medium focus:outline-none focus:ring-2 focus:ring-offset-2 text-red-500 mt-4']) }}>
        {{ $slot }}
    </button>
@endif
