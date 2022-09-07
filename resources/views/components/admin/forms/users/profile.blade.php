<form method="post" action="{{ route('user.profile.update', $user) }}" enctype="multipart/form-data">

    @csrf
    @method('PUT')

    <div class="my-4">
        <img class="rounded-circle avatar" src="{{ $user->avatar }}" alt="{{ $user->name }}">
    </div>

    <div class="form-group required">
        <label for="username" class="control-label">Felhasználónév</label>
        <input
            type="text"
            name="username"
            id="username"
            class="form-control @error('username') is-invalid @enderror"
            required
            autofocus
            value="{{ $user->username }}">

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
               class="form-control @error('name') is-invalid @enderror"
               id="name"
               required
               value="{{ $user->name }}">

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
               class="form-control @error('email') is-invalid @enderror"
               id="email"
               required
               value="{{ $user->email }}">

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
                  rows="10">{{ $user->cv }}</textarea>

        @error('cv')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="form-group">
        <label for="password">Jelszó</label>
        <p class="small mb-2">Legalább 1 kisbetű, nagybetű, szám és speciális karakter</p>
        <input type="password"
               name="password"
               id="password"
               class="form-control @error('password') is-invalid @enderror">

        @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="form-group">
        <label for="password-confirmation">Jelszó megerősítése</label>
        <input type="password"
               name="password-confirmation"
               id="password-confirmation"
               class="form-control @error('password_confirmation') is-invalid @enderror">

        @error('password-confirmation')
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

    <button type="submit" id="submit" class="btn btn-primary mb-3">Mentés</button>
</form>
