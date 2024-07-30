<!doctype html>
<html lang="en" dir="rtl">

@include('backend.inc.head')

<body>
    <!--wrapper-->
    <div class="wrapper">
        @include('backend.inc.sidebar')
        @include('backend.inc.header')

        <!--start page wrapper -->
        <div class="page-wrapper">
            <div class="page-content">
                @yield('content')
            </div>
        </div>
        <!--end page wrapper -->

        <!--start overlay-->
        <div class="overlay toggle-icon"></div>
        <!--end overlay-->

        <!--Start Back To Top Button-->
        <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
        <!--End Back To Top Button-->


        @include('backend.inc.footer')
    </div>
    <!--end wrapper-->

    @include('backend.inc.switcher')
    @include('backend.inc.script')
</body>

</html>
