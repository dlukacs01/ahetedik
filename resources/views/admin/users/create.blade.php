<x-admin-master>
    @section('content')
        <h1 class="mt-4">Új felhasználó</h1>

        <form method="post" action="{{route('user.store')}}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="username">Felhasználónév</label>
                <input type="text" name="username" class="form-control" id="username" aria-describedby="" placeholder="Írd be a felhasználónevet">
                @error('username')
                <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="name">Név</label>
                <input type="text" name="name" class="form-control" id="name" aria-describedby="" placeholder="Írd be a nevet">
                @error('name')
                <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control" id="email" aria-describedby="" placeholder="Írd be az email címet">
                @error('email')
                <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="cv">Bemutatkozás</label>
                <textarea name="cv" class="form-control" id="cv" cols="30" rows="10"></textarea>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control" id="password" aria-describedby="">
                @error('password')
                <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="password-confirmation">Confirm Password</label>
                <input type="password" name="password-confirmation" class="form-control" id="password-confirmation" aria-describedby="">
                @error('password-confirmation')
                <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="avatar">Avatar</label>
                <input type="file" name="avatar" class="form-control-file" id="avatar">
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
