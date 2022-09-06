<form method="post" action="{{ route('user.store') }}" enctype="multipart/form-data">

    @csrf

    <div class="form-group required">
        <label for="username" class="control-label">Felhasználónév</label>
        <input type="text"
               name="username"
               id="username"
               class="form-control @error('username') is-invalid @enderror"
               required
               autofocus
               autocomplete="username"
               placeholder="Felhasználónév"
               value="{{ old('username') }}">

        @error('username')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="form-group required">
        <label for="name" class="control-label">Név</label>
        <input type="text"
               name="name"
               id="name"
               class="form-control @error('name') is-invalid @enderror"
               required
               autocomplete="name"
               placeholder="Név"
               value="{{ old('name') }}">

        @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="form-group required">
        <label for="email" class="control-label">Email</label>
        <input type="email"
               name="email"
               id="email"
               class="form-control @error('email') is-invalid @enderror"
               required
               autocomplete="email"
               placeholder="Email"
               value="{{ old('email') }}">

        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="form-group required">
        <label for="cv" class="control-label">Bemutatkozás</label>
        <textarea name="cv"
                  id="cv"
                  class="form-control @error('cv') is-invalid @enderror"
                  rows="10"></textarea>

        @error('cv')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="form-group required">
        <label for="password" class="control-label">Jelszó</label>
        <p class="small mb-2">Legalább 1 kisbetű, nagybetű, szám és speciális karakter</p>
        <input type="password"
               name="password"
               id="password"
               class="form-control @error('password') is-invalid @enderror"
               required>

        @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="form-group required">
        <label for="password_confirmation" class="control-label">Jelszó megerősítése</label>
        <small>Minimum 8 karakter!</small>
        <input type="password"
               name="password_confirmation"
               id="password_confirmation"
               class="form-control @error('password_confirmation') is-invalid @enderror">

        @error('password_confirmation')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="form-group">
        <label for="avatar">Avatar</label>
        <input type="file"
               name="avatar"
               id="avatar"
               class="form-control-file @error('avatar') is-invalid @enderror">

        @error('avatar')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <button type="submit" id="submit" class="btn btn-primary">Mentés</button>
</form>
