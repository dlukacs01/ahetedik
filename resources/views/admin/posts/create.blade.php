<x-admin-master>
    @section('content')
        <h1 class="mt-4">Új lapszám</h1>

        <form method="post" action="{{route('post.store')}}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="title">Cím</label>
                <input type="text" name="title" class="form-control" id="title" aria-describedby="" placeholder="Írd be a címet">
            </div>
            <div class="form-group">
                <label for="post_image">Borító</label>
                <input type="file" name="post_image" class="form-control-file" id="post_image">
            </div>
{{--            <div class="form-group">--}}
{{--                <label for="body">Beharangozó</label>--}}
{{--                <textarea name="body" class="form-control" id="body" cols="30" rows="30"></textarea>--}}
{{--            </div>--}}
            <button type="submit" class="btn btn-primary">Mentés</button>
        </form>
    @endsection

{{--    @section('scripts')--}}
{{--        <script>--}}
{{--            tinymce.init({--}}
{{--                selector: 'textarea',--}}
{{--                plugins: 'advlist autolink lists link image charmap print preview hr anchor pagebreak',--}}
{{--                toolbar_mode: 'floating',--}}
{{--                style_formats: [--}}
{{--                    {--}}
{{--                        title: 'Image Left',--}}
{{--                        selector: 'img',--}}
{{--                        styles: {--}}
{{--                            'float': 'left',--}}
{{--                            'margin': '0 10px 0 10px'--}}
{{--                        }--}}
{{--                    },--}}
{{--                    {--}}
{{--                        title: 'Image Right',--}}
{{--                        selector: 'img',--}}
{{--                        styles: {--}}
{{--                            'float': 'right',--}}
{{--                            'margin': '0 0 10px 10px'--}}
{{--                        }--}}
{{--                    }--}}
{{--                ]--}}
{{--            });--}}
{{--        </script>--}}
{{--    @endsection--}}
</x-admin-master>
