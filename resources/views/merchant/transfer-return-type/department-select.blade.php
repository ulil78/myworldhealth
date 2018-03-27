<option> --- Select Program --- </option>
@if(!empty($programs))
  @foreach($programs as $item)
    <option value="{{ $item->id }}">{{ $item->name }}</option>
  @endforeach
@endif
