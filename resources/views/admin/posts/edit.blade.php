<x-admin-master>
    @section('content')

        <h1 class="mt-4">Lapszám szerkesztése</h1>

        <x-admin.forms.posts.edit :post="$post"></x-admin.forms.posts.edit>

    @endsection
</x-admin-master>
