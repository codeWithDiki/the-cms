@props([
    "name",
    "logo_url"
])

<div class="flex gap-2 items-center relative">
    <img src="{{ asset($logo_url) }}" class="w-auto h-12" alt="{{ $name }} logo">
    <h2>
        {{ $name }}
    </h2>
    <a href="{{ route("home") }}" wire:navigate class="absolute inset-0"></a>
</div>