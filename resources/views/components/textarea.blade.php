@props(['value', 'placeholder'])
<textarea id="{{ $value }}" name="{{ $value }}" placeholder="{{ $placeholder ? $placeholder : old($value) }}" value="{{ $placeholder }}" class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"></textarea>
