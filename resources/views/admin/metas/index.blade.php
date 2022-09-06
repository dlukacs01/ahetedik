<x-admin-master>
    @section('content')

        <h1 class="mt-4">Az oldalhoz tartozó leírások</h1>

        @if(session()->has('meta-updated-message'))
            <div class="alert alert-success">
                {{session('meta-updated-message')}}
            </div>
        @endif

        <x-admin.forms.metas.index :meta="$meta"></x-admin.forms.metas.index>

    @endsection

    @section('scripts')
        @include('includes.tinyeditor');

        <script>
            $(document).ready(function(){
                $('#submit').click(function(event) {
                    if(tinymce.get('szerzoknek').getContent().length < 1) {
                        alert('A szerzőknek mező kitöltése kötelező!');
                        event.preventDefault();
                    }
                    if(tinymce.get('nyilatkozat').getContent().length < 1) {
                        alert('A nyilatkozat mező kitöltése kötelező!');
                        event.preventDefault();
                    }
                    if(tinymce.get('elvek').getContent().length < 1) {
                        alert('Az elvek mező kitöltése kötelező!');
                        event.preventDefault();
                    }
                    if(tinymce.get('jogok').getContent().length < 1) {
                        alert('A jogok mező kitöltése kötelező!');
                        event.preventDefault();
                    }
                    if(tinymce.get('impresszum').getContent().length < 1) {
                        alert('Az impresszum mező kitöltése kötelező!');
                        event.preventDefault();
                    }
                    if(tinymce.get('gdpr').getContent().length < 1) {
                        alert('A gdpr mező kitöltése kötelező!');
                        event.preventDefault();
                    }
                });
            });
        </script>

    @endsection
</x-admin-master>
