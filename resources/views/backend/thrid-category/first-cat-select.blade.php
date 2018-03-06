<option>--- Select Second Category ---</option>
@if(!empty($seconds))
  @foreach($seconds as $item)
    <option value="{{ $item->id }}">{{ $item->name }}</option>
  @endforeach
@endif
