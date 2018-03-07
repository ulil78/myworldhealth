<option>--- Select City ---</option>
@if(!empty($cities))
  @foreach($cities as $item)
    <option value="{{ $item->id }}">{{ $item->name }}</option>
  @endforeach
@endif
