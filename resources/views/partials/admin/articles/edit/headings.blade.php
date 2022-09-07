@foreach($headings as $heading)

    <option value="{{ $heading->id }}" {{ $article->heading_id == $heading->id ? 'selected' : '' }}>
        {{$heading->title}}
    </option>

@endforeach
