@props(['options', 'value' => null])

<select {{ $attributes->merge(['class' => 'w-full pl-2 pr-2 py-1.5 bg-teal-300 text-gray-900 border-2 border-teal-600 focus:ring-lime-200 drop-shadow rounded']) }}>
    @foreach($options as $optionValue => $optionLabel)
        <option value="{{ $optionValue }}" {{ $optionValue == $value ? 'selected' : '' }}>
            {{ $optionLabel }}
        </option>
    @endforeach
</select>
