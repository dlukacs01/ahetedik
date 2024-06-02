<x-admin-master>
    @section('content')

        <h1 class="mt-4">Új hír</h1>

        <x-admin.forms.stories.create></x-admin.forms.stories.create>

    @endsection

    @section('scripts')
        {{-- @include('includes.tinyeditor') --}}
        <x-admin.tinymce></x-admin.tinymce>

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
