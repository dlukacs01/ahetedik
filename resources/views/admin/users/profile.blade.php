<x-admin-master>
    @section('content')

        <h1 class="mt-4">{{ $user->name }}</h1>

        <div class="my-4">
            <img class="rounded-circle avatar" src="{{ $user->avatar }}" alt="{{ $user->name }}">
        </div>

        <div class="row">
            <div class="col-sm-6">

                <x-admin.forms.users.profile :user="$user"></x-admin.forms.users.profile>

            </div>
        </div>

        <hr>

        <div class="row">
            <div class="col-sm-12">

                <h3>Szerepkörök</h3>
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Opciók</th>
                                <th>Név</th>
                                <th>Hozzárendel</th>
                                <th>Leválaszt</th>
                            </tr>
                        </thead>
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
                                    <td>{{ $role->name }}</td>
                                    <td>
                                        <form method="post" action="{{ route('user.role.attach', $user) }}">

                                            @method('PUT')
                                            @csrf

                                            <input type="hidden" name="role" value="{{ $role->id }}">
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
                                        <form method="post" action="{{ route('user.role.detach', $user) }}">

                                            @method('PUT')
                                            @csrf

                                            <input type="hidden" name="role" value="{{ $role->id }}">
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

            </div>
        </div>
    @endsection

    @section('scripts')
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
