<!DOCTYPE html>
<html lang="en">
@include('WebSite.inc.head')
    <body>

        <!-- Spinner Start -->
        <div id="spinner" class="show w-100 vh-100 bg-white position-fixed translate-middle top-50 start-50  d-flex align-items-center justify-content-center">
            <div class="spinner-grow text-primary" role="status"></div>
        </div>
        <!-- Spinner End -->


        <!-- Navbar start -->
      @include('WebSite.inc.header')
        <!-- Navbar End -->


       <div>
        @yield('content')
       </div>


        <!-- Footer Start -->
      @include('WebSite.inc.footer')


        <!-- Back to Top -->
        <a href="#" class="btn btn-md-square btn-primary rounded-circle back-to-top"><i class="fa fa-arrow-up"></i></a>


        <!-- JavaScript Libraries -->
     @include('WebSite.inc.script')
    </body>
</html>
