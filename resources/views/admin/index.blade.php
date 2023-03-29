@section('container')
    <!doctype html>
    <html lang="en">

    {{-- tag head --}}
    @include('admin.parts.head')

    <body>
        @include('admin.parts.navbar')
        @include('admin.parts.sidebar')
        <main id="main" class="main">
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
