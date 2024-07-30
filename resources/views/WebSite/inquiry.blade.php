@extends('WebSite.inc.master')
@section('title', 'inquirePlayer')
@section('content')

<!-- Team Start -->
<div class="container-fluid team py-6">
    <div class="container">
        <div class="text-center wow bounceInUp" data-wow-delay="0.1s">
            <small class="d-inline-block fw-bold text-dark text-uppercase bg-light border border-primary rounded-pill px-4 py-1 mb-3">استعلام</small>
            <h1 class="display-5 mb-5">استعلام عن نتيجة اللاعب</h1>

            <form action="{{ route('inquire.show') }}" method="post" class="mx-auto" style="max-width: 400px;">
                @csrf
                <div class="input-wrapper">
                    <input name="phone" id="phone" class="form-control border-primary w-100 py-3 ps-4" type="text" placeholder="رقم الموبايل">
                    <button type="submit" class="btn btn-inside-input">دخول</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Team End -->

<!-- Toastr Notification -->
@if(session('error'))
    <script>
        toastr.error("{{ session('error') }}");
    </script>
@endif

@endsection


