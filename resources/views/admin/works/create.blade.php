<x-admin-master>
    @section('content')
        <h1 class="mt-4">Új mű</h1>

        @if(session('work-duplicate-message'))
            <div class="alert alert-danger">{{session('work-duplicate-message')}}</div>
        @endif

        <form method="post" action="{{route('work.store')}}" enctype="multipart/form-data">
            @csrf
            <div class="form-group required">
                <label for="title" class="control-label">Cím</label>
                <input type="text" name="title" class="form-control" id="title" aria-describedby="" placeholder="Írd be a címet" required>
            </div>

            <div class="form-group required">
                <label for="release_date" class="control-label">Megjelenési idő</label>
                <input type="date" name="release_date" class="form-control" id="release_date" aria-describedby="" required>
            </div>

{{--            <div class="form-group">--}}
{{--                <label for="category_id">Kategória:</label>--}}
{{--                <select class="form-control" id="category_id" name="category_id">--}}
{{--                    @foreach($categories as $category)--}}
{{--                        <option value="{{$category->id}}">{{$category->name}}</option>--}}
{{--                    @endforeach--}}
{{--                </select>--}}
{{--            </div>--}}

            <div class="form-group required">
            <label for="" class="control-label">Kategóriák</label>
            @foreach($categories as $category)
            <div class="form-check">
                <label class="form-check-label" for="{{$category->id}}">
                    <div class="checkbox-group required-chckbx">
                        <input
                            type="checkbox"
                            class="form-check-input"
                            id="{{$category->id}}"
                            name="categories[]"
                            value="{{$category->id}}"
                        >{{$category->name}}
                    </div>
                </label>
            </div>
            @endforeach
            </div>

            <div class="form-group required">
                <label for="user_id" class="control-label">Szerző:</label>
                <select class="form-control" id="user_id" name="user_id">
                    @foreach($users as $user)
                        <option value="{{$user->id}}">{{$user->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="work_image">Borító</label>
                <input type="file" name="work_image" class="form-control-file" id="work_image">
            </div>
            <div class="form-group required">
                <label for="type" class="control-label">Kiemelt mű?</label>
                <select class="form-control" id="active" name="active">
                    <option value="1">Igen</option>
                    <option value="0">Nem</option>
                </select>
            </div>
            <div class="form-group required">
                <label for="body" class="control-label">Tartalom</label>
                <div>
                    @error('body')
                    <span><strong>{{$message}}</strong></span>
                    @enderror
                </div>
                <textarea name="body" class="form-control" id="body" cols="30" rows="20"></textarea>
            </div>
            <button type="submit" id="submit" class="btn btn-primary">Mentés</button>
        </form>
    @endsection

    @section('scripts')
        @include('includes.tinyeditor');

        <script>
            $(document).ready(function(){
                $('#submit').click(function(event) {
                    if($('div.checkbox-group.required-chckbx :checkbox:checked').length < 1) {
                        alert('Legalább egy kategória választása kötelező!');
                        event.preventDefault();
                    }
                });
            });
        </script>

        <script>
            $(document).ready(function(){
                $('#submit').click(function(event) {
                    if(tinymce.get('body').getContent().length < 1) {
                        alert('A tartalom mező kitöltése kötelező!');
                        event.preventDefault();
                    }
                });
            });
        </script>
    @endsection
</x-admin-master>
