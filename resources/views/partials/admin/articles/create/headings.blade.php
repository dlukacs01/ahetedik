@foreach($headings as $heading)
    <option value="{{ $heading->id }}">{{ $heading->title }}</option>
@endforeach
