<!DOCTYPE html>
<html lang="hu-HU">

    <x-home.header :title="$title"></x-home.header>

    <body>

        <x-home.topnav></x-home.topnav>

        <div class="container" style="background-color: rgb(229,229,233);">
            @yield('content')
        </div>

        <x-home.footer></x-home.footer>

    </body>

</html>
