<x-admin-master>
    @section('content')
        <h1 class="mt-4">{{$user->name}}</h1>

        <div class="row">
            <div class="col-sm-6">
                <form method="post" action="{{route('user.profile.update', $user)}}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-4 profile-img">
                        <img class="img-profile rounded-circle" src="{{$user->avatar}}">
                    </div>
                    <div class="form-group required">
                        <label for="username" class="control-label">Felhasználónév</label>
                        <input
                            type="text"
                            name="username"
                            class="form-control @error('username') is-invalid @enderror"
                            id="username"
                            aria-describedby=""
                            required
                            value="{{$user->username}}">
                        @error('username')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group required">
                        <label for="name" class="control-label">Név</label>
                        <input type="text" name="name" class="form-control" id="name" aria-describedby="" required value="{{$user->name}}">
                        @error('name')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group required">
                        <label for="email" class="control-label">Email</label>
                        <input type="email" name="email" class="form-control" id="email" aria-describedby="" required value="{{$user->email}}">
                        @error('email')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group required">
                        <label for="cv" class="control-label">Bemutatkozás</label>
                        <div>
                            @error('cv')
                            <span><strong>{{$message}}</strong></span>
                            @enderror
                        </div>
                        <textarea name="cv" class="form-control" id="cv" cols="30" rows="20">{{$user->cv}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="password">Jelszó</label>
                        <small>Minimum 8 karakter!</small>
                        <input type="password"
                               name="password"
                               class="form-control"
                               id="password"
                               aria-describedby=""
                               pattern=".{8,}"
                               title="8 characters minimum">
                        @error('password')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="password-confirmation">Jelszó megerősítése</label>
                        <small>Minimum 8 karakter!</small>
                        <input type="password"
                               name="password-confirmation"
                               class="form-control"
                               id="password-confirmation"
                               aria-describedby=""
                               pattern=".{8,}"
                               title="8 characters minimum">
                        @error('password-confirmation')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="avatar">Avatar</label>
                        <input type="file" name="avatar" class="form-control-file" id="avatar">
                    </div>
                    <button type="submit" id="submit" class="btn btn-primary">Mentés</button>
                </form>
            </div>
        </div>

        <hr>

        <div class="row">
            <div class="col-sm-12">
{{--                <div class="card mb-4">--}}
{{--                    <div class="card-header">--}}
{{--                        <i class="fas fa-table mr-1"></i>--}}
{{--                        Roles--}}
{{--                    </div>--}}
{{--                    <div class="card-body">--}}
                        <h3>Szerepkörök</h3>
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                    <th>Opciók</th>
                                    <th>Id</th>
                                    <th>Név</th>
                                    <th>Slug</th>
                                    <th>Hozzárendel</th>
                                    <th>Leválaszt</th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th>Opciók</th>
                                    <th>Id</th>
                                    <th>Név</th>
                                    <th>Slug</th>
                                    <th>Hozzárendel</th>
                                    <th>Leválaszt</th>
                                </tr>
                                </tfoot>
                                <tbody>
                                @foreach($roles as $role)
                                    <tr>
                                        <td>
                                            <input type="checkbox"
                                            @foreach($user->roles as $user_role)
                                                @if($user_role->slug == $role->slug)
                                                    checked
                                                @endif()
                                            @endforeach
                                            >
                                        </td>
                                        <td>{{$role->id}}</td>
                                        <td>{{$role->name}}</td>
                                        <td>{{$role->slug}}</td>
                                        <td>
                                            <form method="post" action="{{route('user.role.attach', $user)}}">
                                                @method('PUT')
                                                @csrf
                                                <input type="hidden" name="role" value="{{$role->id}}">
                                                <button
                                                    type="submit"
                                                    class="btn btn-primary"
                                                    @if($user->roles->contains($role))
                                                    disabled
                                                    @endif
                                                >Hozzárendel
                                                </button>
                                            </form>
                                        </td>
                                        <td>
                                            <form method="post" action="{{route('user.role.detach', $user)}}">
                                                @method('PUT')
                                                @csrf
                                                <input type="hidden" name="role" value="{{$role->id}}">
                                                <button
                                                    type="submit"
                                                    class="btn btn-danger"
                                                    @if(!$user->roles->contains($role))
                                                    disabled
                                                    @endif
                                                >Leválaszt
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
{{--                    </div>--}}
{{--                </div>--}}
            </div>
        </div>
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
