@section('container')
    <!doctype html>
    <html lang="en">

    {{-- tag head --}}
    @include('admin.parts.head')

    <body>
        @include('admin.parts.navbar')
        @include('admin.parts.sidebar')
        <main id="main" class="main">
            <div class="pagetitle">
                <h1 class="mb-2 fs-2 font-poppins">Welcome to admin </h1>
                <nav class="shadow-sm bg-body rounded pt-2 px-2 " style="width: 98%;">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item fs-6"><a href="/dashboardAdmin" class="text-decoration-none">Home</a></li>
                        @yield('pagetitle')
                    </ol>
                </nav>
            </div>
            @yield('container')
        </main>

        <!-- ======= Footer ======= -->
        <footer id="footer" class="footer bg-dark" style="height: 100px;">
            <div class="copyright">

            </div>
            <div class="credits">

            </div>
        </footer>
        <!-- End Footer -->

        {{--  tag script --}}
        @include('admin.parts.script')

    </body>





    </html>
