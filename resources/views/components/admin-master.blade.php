<!DOCTYPE html>
<html lang="hu-HU">

    <x-admin.header></x-admin.header>

    <body class="sb-nav-fixed">

        <x-admin.topnav></x-admin.topnav>

        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">

                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Főmenü</div>
                            <a class="nav-link" href="{{route('admin.index')}}">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Vezérlőpult
                            </a>

                            <div class="sb-sidenav-menu-heading">Kezelés</div>

                            @if(auth()->user()->userHasRole('Admin') or auth()->user()->userHasRole('Editor'))
                                <x-admin.sidebar.admin-sidebar-posts-links></x-admin.sidebar.admin-sidebar-posts-links>
                                <x-admin.sidebar.admin-sidebar-headings-links></x-admin.sidebar.admin-sidebar-headings-links>
                                <x-admin.sidebar.admin-sidebar-articles-links></x-admin.sidebar.admin-sidebar-articles-links>
                                <x-admin.sidebar.admin-sidebar-works-links></x-admin.sidebar.admin-sidebar-works-links>
                                <x-admin.sidebar.admin-sidebar-stories-links></x-admin.sidebar.admin-sidebar-stories-links>
                            @endif

                            <div class="sb-sidenav-menu-heading">Egyéb</div>

                            @if(auth()->user()->userHasRole('Admin'))
                                <x-admin.sidebar.admin-sidebar-categories-links></x-admin.sidebar.admin-sidebar-categories-links>
                                <x-admin.sidebar.admin-sidebar-metas-links></x-admin.sidebar.admin-sidebar-metas-links>
                                <x-admin.sidebar.admin-sidebar-users-links></x-admin.sidebar.admin-sidebar-users-links>
                            @endif
                        </div>
                    </div>

                    <div class="sb-sidenav-footer">
                        <div class="small">Belépve, mint:</div>
                        @if(Auth::check())
                            {{ auth()->user()->name }}
                        @endif
                    </div>

                </nav>
            </div>

            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">

                        @yield('content')

                    </div>
                </main>

                <x-admin.footer></x-admin.footer>

            </div>
        </div>

        <x-admin.scripts></x-admin.scripts>

    </body>
</html>
