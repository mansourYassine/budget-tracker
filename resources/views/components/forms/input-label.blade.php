@props(['value'])

<label {{ $attributes->merge(['class' => ' text-sm font-medium text-gray-600 mb-2.5 ']) }}>
    {{ $value ?? $slot }}
</label>