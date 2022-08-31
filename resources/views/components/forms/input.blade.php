<div>
    @if(!empty($label))
        <label for="{{ $name }}" class="form-label">{{ $label }}</label>
    @endif
    <input id="{{ $id ?? $name}}" {{$attributes}} value="{{ $value }}" name="{{ $name }}" type="{{ $type }}" class="form-control">
    @error($name)
        <span class="text-sm text-red-400">{{ $message }}</span>
    @enderror
</div>