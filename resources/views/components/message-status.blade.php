@props(['message'])

@if ($message)
<div {{ $attributes->merge(['class' => 'font-medium text-sm text-green-600']) }}>
    {{ $message }}
</div>
@endif