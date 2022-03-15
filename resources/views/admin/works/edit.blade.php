<x-admin-master>
    @section('content')
        <h1 class="mt-4">Mű szerkesztése</h1>

        <form method="post" action="{{route('work.update', $work->id)}}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="form-group required">
                <label for="title" class="control-label">Cím</label>
                <input type="text"
                       name="title"
                       class="form-control"
                       id="title"
                       aria-describedby=""
                       placeholder="Enter title"
                       required
                       value="{{$work->title}}">
            </div>

            <div class="form-group required">
                <label for="release_date" class="control-label">Megjelenési idő</label>
                <input type="date"
                       name="release_date"
                       class="form-control"
                       id="release_date"
                       aria-describedby=""
                       required
                       value="{{$work->release_date}}">
            </div>

{{--            <div class="form-group">--}}
{{--                <label for="category_id">Kategória:</label>--}}
{{--                <select class="form-control" id="category_id" name="category_id">--}}
{{--                    @foreach($categories as $category)--}}
{{--                        <option value="{{$category->id}}" {{$work->category_id == $category->id ? 'selected' : ''}}>{{$category->name}}</option>--}}
{{--                    @endforeach--}}
{{--                </select>--}}
{{--            </div>--}}

            <div class="form-group required">
                <label for="" class="control-label">Kategóriák</label>
                @foreach($categories as $category)
                    <div class="form-check">
                        <label class="form-check-label" for="{{$category->id}}">
                            <input
                                type="checkbox"
                                class="form-check-input"
                                id="{{$category->id}}"
                                name="categories[]"
                                value="{{$category->id}}"
                                @foreach($work->categories as $work_category)
                                    @if($category->name === $work_category->name)
                                        checked
                                    @endif
                                @endforeach
                            >{{$category->name}}
                        </label>
                    </div>
                @endforeach
            </div>

            <div class="form-group required">
                <label for="user_id" class="control-label">Szerző:</label>
                <select class="form-control" id="user_id" name="user_id">
                    @foreach($users as $user)
                        <option value="{{$user->id}}" {{$work->user->id == $user->id ? 'selected' : ''}}>{{$user->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <div><img height="100px" src="{{$work->work_image}}" alt=""></div>
                <label for="work_image">Borító</label>
                <input type="file" name="work_image" class="form-control-file" id="work_image">
            </div>
            <div class="form-group required">
                <label for="type" class="control-label">Kiemelt mű?</label>
                <select class="form-control" id="active" name="active">
                    <option value="1" {{$work->active == 1 ? 'selected' : ''}}>Igen</option>
                    <option value="0" {{$work->active == 0 ? 'selected' : ''}}>Nem</option>
                </select>
            </div>
            <div class="form-group required">
                <label for="body" class="control-label">Tartalom</label>
                <div>
                    @error('body')
                    <span><strong>{{$message}}</strong></span>
                    @enderror
                </div>
                <textarea name="body" class="form-control" id="body" cols="30" rows="20">{{$work->body}}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Mentés</button>
        </form>
    @endsection

    @section('scripts')
        <script>
            tinymce.init({
                selector: 'textarea',
                plugins: 'advlist autolink lists link image charmap print preview hr anchor pagebreak',
                toolbar_mode: 'floating',
            });
        </script>
    @endsection
</x-admin-master>
