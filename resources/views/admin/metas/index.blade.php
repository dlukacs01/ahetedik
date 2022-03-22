<x-admin-master>
    @section('content')
        <h1 class="mt-4">Az oldalhoz tartozó leírások</h1>

        @if(session()->has('meta-updated-message'))
            <div class="alert alert-success">
                {{session('meta-updated-message')}}
            </div>
        @endif

        <form method="post" action="{{route('meta.update',$meta->id)}}">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="szerzoknek">Szerzőink figyelmébe</label>
                <textarea name="szerzoknek" class="form-control" id="szerzoknek" cols="30" rows="20">{{$meta->szerzoknek}}</textarea>
            </div>
            <div class="form-group">
                <label for="nyilatkozat">Szerkesztőségi nyilatkozat</label>
                <textarea name="nyilatkozat" class="form-control" id="nyilatkozat" cols="30" rows="20">{{$meta->nyilatkozat}}</textarea>
            </div>
            <div class="form-group">
                <label for="elvek">Szerkesztési elvek</label>
                <textarea name="elvek" class="form-control" id="elvek" cols="30" rows="20">{{$meta->elvek}}</textarea>
            </div>
            <div class="form-group">
                <label for="jogok">Szerzői jogok</label>
                <textarea name="jogok" class="form-control" id="jogok" cols="30" rows="20">{{$meta->jogok}}</textarea>
            </div>
            <div class="form-group">
                <label for="impresszum">Impresszum</label>
                <textarea name="impresszum" class="form-control" id="impresszum" cols="30" rows="20">{{$meta->impresszum}}</textarea>
            </div>
            <div class="form-group">
                <label for="gdpr">Általános Adatvédelmi Nyilatkozat</label>
                <textarea name="gdpr" class="form-control" id="gdpr" cols="30" rows="20">{{$meta->gdpr}}</textarea>
            </div>
            <button type="submit" id="submit" class="btn btn-primary">Mentés</button>
        </form>
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
