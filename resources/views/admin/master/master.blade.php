
<!DOCTYPE html>
<html lang="en">

    @include('admin.modules.head')

    <body class="sb-nav-fixed">
        @include('admin.modules.navbar')


        <div id="layoutSidenav">
            @include('admin.modules.sidebar')


            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>

                        @yield('content')

                    </div>
                </main>
               @include('admin.modules.footer')
            </div>
        </div>
       @include('admin.modules.scripts')
    </body>
</html>
