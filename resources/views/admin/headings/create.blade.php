<x-admin-master>
    @section('content')
        <h1 class="mt-4">Új rovat</h1>

        <x-admin.forms.headings.create :posts="$posts"></x-admin.forms.headings.create>

    @endsection
</x-admin-master>
