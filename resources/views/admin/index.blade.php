<x-admin-master>
    @section('content')
        @if(auth()->user()->userHasRole('Admin'))
        <h1 class="mt-4">Vezérlőpult</h1>
        @endif
    @endsection
</x-admin-master>
