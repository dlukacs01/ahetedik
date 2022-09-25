<footer class="py-4">
    <div class="container text-center text-secondary">
        <p class="mb-3">
            <a href="{{ route('meta.nyilatkozat') }}" class="mr-1 small text-secondary">Szerkesztőségi nyilatkozat</a>
            <a href="{{ route('meta.elvek') }}" class="mr-1 small text-secondary">Szerkesztési elvek</a>
            <a href="{{ route('meta.jogok') }}" class="mr-1 small text-secondary">Szerzői jogok</a>
            <a href="{{ route('meta.impresszum') }}" class="mr-1 small text-secondary">Impresszum</a>
            <a href="{{ route('meta.gdpr') }}" class="mr-1 small text-secondary">Általános Adatvédelmi Nyilatkozat</a>
        </p>
        <p class="small">
            Oldalletöltés száma: {{ App\Detail::findOrFail(1)->home_view_count }}
        </p>
        <p class="m-0 small">
            &copy; {{ date('Y') }} {{ config('app.name') }} &middot; v{{ config('custom.version_no') }}
        </p>
    </div>
</footer>

<!-- Bootstrap core JavaScript -->
<script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<!-- page level scripts -->
@yield('scripts')
