<x-admin-master>
    @section('content')

        <h1 class="mt-4">Mű szerkesztése</h1>

        <x-admin.forms.works.edit :work="$work" :categories="$categories" :users="$users"></x-admin.forms.works.edit>

    @endsection

    @section('scripts')
        {{-- @include('includes.tinyeditor') --}}
        <x-admin.tinymce></x-admin.tinymce>

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
