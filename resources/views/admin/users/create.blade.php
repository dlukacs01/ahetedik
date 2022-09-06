<x-admin-master>
    @section('content')

        <h1 class="mt-4">Új felhasználó</h1>

        <x-admin.forms.users.create></x-admin.forms.users.create>

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
