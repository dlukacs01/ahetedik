<x-admin-master>
    @section('content')

        <h1 class="mt-4">Új felhasználó</h1>

        <x-admin.forms.users.create></x-admin.forms.users.create>

    @endsection

    @section('scripts')

        {{-- TINY-MCE --}}
        <script src="{{ asset('js/custom/tiny-mce/langs/hu_HU.js') }}"></script>
        <script src="{{ asset('js/custom/tiny-mce/tiny-mce.js') }}"></script>

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
