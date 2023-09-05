@props(['model', 'label'])

<div class="flex items-center">
    <input type="checkbox" wire:model.live="{{ $model }}" name="{{ $model }}" {{ $attributes->merge(['class' => 'mr-2 w-4 h-4 text-teal-600 bg-gray-100 border-gray-300 rounded focus:ring-teal-500']) }}>
    <label for="{{ $model }}" class="text-teal-900 text-md font-semibold">{{ $label }}</label>
</div>
