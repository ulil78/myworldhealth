<option>--- Select Thrid Category ---</option>
@if(!empty($thrids))
  @foreach($thrids as $item)
    <option value="{{ $item->id }}">{{ $item->name }}</option>
  @endforeach
@endif
