<x-admin-master>
    @section('content')
        <h1 class="mt-4">Új mű</h1>

        @if(session('duplicated'))
            <div class="alert alert-danger">{{ session('duplicated')}} </div>
        @endif

        <x-admin.forms.works.create :categories="$categories" :users="$users"></x-admin.forms.works.create>

    @endsection

    @section('scripts')
        @include('includes.tinyeditor');

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
