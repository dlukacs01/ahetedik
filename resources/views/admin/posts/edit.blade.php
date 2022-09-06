<x-admin-master>
    @section('content')

        <h1 class="mt-4">Lapszám szerkesztése</h1>

        <x-admin.forms.posts.edit :post="$post"></x-admin.forms.posts.edit>

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
