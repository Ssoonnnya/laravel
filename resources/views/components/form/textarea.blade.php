@props(['name'])

<x-form.field>
    <x-input.label name="{{ $name }}"/>


    <textarea class="border border-gray-400 p-2 w-full"
        name="{{ $name }}"
        id="{{ $name }}"
        required>{{ old($name) }}</textarea>

    <x-form.error mame="{{ $name }}" />

    @enderror

</x-form.field>

