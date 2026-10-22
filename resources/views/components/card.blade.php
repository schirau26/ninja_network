@props([
    "highlight" => false,
    "ninja" => null,
])

<div @class(["highlight"=> $highlight , 'card'])>
{{ $slot }}
<div class="inline-flex gap-2">
    <a href="{{ route('ninjas.show', $ninja) }}" class="btn">View Details</a>
    <a href="{{ route('ninjas.edit', $ninja) }}" class="btn">Edit</a>
</div>
</div>