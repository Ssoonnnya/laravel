@props(['name'])

<x-form.field>

    <x-input.label name="{{ $name }}"/>

    <input class="border border-gray-400 p-2 w-full"
           type="text"
           name="{{ $name }}"
           id="{{ $name }}"
           value="{{ old($name) }}"
           required>

           <x-form.error mame="{{ $name }}" />

</x-form.field>
