@foreach ($items as $item)
<input
    type="checkbox"
    name="{{ $name }}"
    id="{{ $id . $item->id }}"
    value="{{ $item->id }}"
    @if (in_array($item->id, $selected)) checked @endif
>
<label for="{{ $id }}">{{ $item->name }}</label><br />
@endforeach