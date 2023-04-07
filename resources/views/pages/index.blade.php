@section('container')
    <!doctype html>
    <html lang="en">

    {{-- tag head --}}
    @include('parts.head')

    <body>
        @include('parts.navbar')
        @if (auth()->user()->cekLevel == 'admin')
            @include('admin.parts.sidebar')
        @else
            @include('user.parts.sidebar')
        @endif

        <main id="main" class="main">

            <div class="pagetitle">
                <h1 class="mb-2 fs-2 font-poppins">Welcome to {{ auth()->user()->nama }}</h1>
                <nav class="shadow-sm bg-body rounded pt-2 px-2 " style="width: 98%;">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item fs-6"><a href="/dashboardAdmin" class="text-decoration-none">Home</a></li>
                        @yield('pagetitle')
                    </ol>
                </nav>
            </div>
            @yield('container')
        </main>
        @include('parts.footer')

        {{--  tag script --}}
        <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
                class="bi bi-arrow-up-short"></i></a>
        @include('parts.script')
        @yield('script')

    </body>

    </html>
