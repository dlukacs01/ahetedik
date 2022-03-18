<x-admin-master>
    @section('content')
        <h1 class="mt-4">Új felhasználó</h1>

        <form method="post" action="{{route('user.store')}}" enctype="multipart/form-data">
            @csrf
            <div class="form-group required">
                <label for="username" class="control-label">Felhasználónév</label>
                <input type="text" name="username" class="form-control" id="username" aria-describedby="" placeholder="Írd be a felhasználónevet" required>
                @error('username')
                <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>
            <div class="form-group required">
                <label for="name" class="control-label">Név</label>
                <input type="text" name="name" class="form-control" id="name" aria-describedby="" placeholder="Írd be a nevet" required>
                @error('name')
                <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>
            <div class="form-group required">
                <label for="email" class="control-label">Email</label>
                <input type="email" name="email" class="form-control" id="email" aria-describedby="" placeholder="Írd be az email címet" required>
                @error('email')
                <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>
            <div class="form-group required">
                <label for="cv" class="control-label">Bemutatkozás</label>
                <div>
                    @error('cv')
                    <span><strong>{{$message}}</strong></span>
                    @enderror
                </div>
                <textarea name="cv" class="form-control" id="cv" cols="30" rows="20"></textarea>
            </div>
            <div class="form-group required">
                <label for="password" class="control-label">Jelszó</label>
                <input type="password"
                       name="password"
                       class="form-control"
                       id="password"
                       aria-describedby=""
                       pattern=".{8,}"
                       required
                       title="8 characters minimum">
                @error('password')
                <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>
            <div class="form-group required">
                <label for="password-confirmation" class="control-label">Jelszó megerősítése</label>
                <input type="password"
                       name="password-confirmation"
                       class="form-control"
                       id="password-confirmation"
                       aria-describedby=""
                       pattern=".{8,}"
                       required
                       title="8 characters minimum">
                @error('password-confirmation')
                <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="avatar">Avatar</label>
                <input type="file" name="avatar" class="form-control-file" id="avatar">
            </div>
            <button type="submit" id="submit" class="btn btn-primary">Mentés</button>
        </form>
    @endsection

    @section('scripts')
{{--        <script>--}}
{{--            tinymce.init({--}}
{{--                selector: 'textarea',--}}
{{--                plugins: 'advlist autolink lists link image charmap print preview hr anchor pagebreak',--}}
{{--                toolbar_mode: 'floating',--}}
{{--            });--}}
{{--        </script>--}}

        @include('includes.tinyeditor');

        <script>
            $(document).ready(function(){
                $('#submit').click(function(event) {
                    if(tinymce.get('cv').getContent().length < 1) {
                        alert('A tartalom mező kitöltése kötelező!');
                        event.preventDefault();
                    }
                });
            });
        </script>

    @endsection
</x-admin-master>
