@props(['value'])
@error($value)
    <p style="color:red;" class="text-red-500 text-xs italic">{{ $message }}</p>
@enderror
