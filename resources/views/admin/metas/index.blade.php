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
                <textarea name="szerzoknek" class="form-control" id="szerzoknek" cols="30" rows="10">{{$meta->szerzoknek}}</textarea>
            </div>
            <div class="form-group">
                <label for="nyilatkozat">Szerkesztőségi nyilatkozat</label>
                <textarea name="nyilatkozat" class="form-control" id="nyilatkozat" cols="30" rows="10">{{$meta->nyilatkozat}}</textarea>
            </div>
            <div class="form-group">
                <label for="elvek">Szerkesztési elvek</label>
                <textarea name="elvek" class="form-control" id="elvek" cols="30" rows="10">{{$meta->elvek}}</textarea>
            </div>
            <div class="form-group">
                <label for="jogok">Szerzői jogok</label>
                <textarea name="jogok" class="form-control" id="jogok" cols="30" rows="10">{{$meta->jogok}}</textarea>
            </div>
            <div class="form-group">
                <label for="impresszum">Impresszum</label>
                <textarea name="impresszum" class="form-control" id="impresszum" cols="30" rows="10">{{$meta->impresszum}}</textarea>
            </div>
            <div class="form-group">
                <label for="gdpr">Általános Adatvédelmi Nyilatkozat</label>
                <textarea name="gdpr" class="form-control" id="gdpr" cols="30" rows="10">{{$meta->gdpr}}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Mentés</button>
        </form>
    @endsection

    @section('scripts')
        <script>
            tinymce.init({
                selector: 'textarea',
                plugins: 'advlist autolink lists link image charmap print preview hr anchor pagebreak',
                toolbar_mode: 'floating',
            });
        </script>
    @endsection
</x-admin-master>
