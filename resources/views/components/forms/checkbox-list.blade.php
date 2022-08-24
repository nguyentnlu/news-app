<div class="row">
@foreach ($items as $item)
    <div class="col-md-2">
        <input
            type="checkbox"
            name="{{ $name }}"
            id="{{ $id . $item->id }}"
            value="{{ $item->id }}"
            @if (in_array($item->id, $selected)) checked @endif
        >
        <label for="{{ $id }}">{{ $item->name }}</label><br />
    </div>
@endforeach
</div>