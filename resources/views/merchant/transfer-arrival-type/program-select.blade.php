<option> --- Select Transfer Arrival --- </option>
@if(!empty($transfers))
  @foreach($transfers as $item)
    <option value="{{ $item->id }}">{{ $item->name }}</option>
  @endforeach
@endif
