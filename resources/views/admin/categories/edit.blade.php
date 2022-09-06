<x-admin-master>
    @section('content')
    <div class="row">
        <div class="col-sm-6">

            <h1 class="mt-4">Kategória szerkesztése</h1>

            <x-admin.forms.categories.edit :category="$category"></x-admin.forms.categories.edit>

        </div>
    </div>
    @endsection
</x-admin-master>
