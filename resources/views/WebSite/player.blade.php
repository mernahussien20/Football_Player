
@extends('WebSite.inc.master')
@section('title', 'Register')
@section('content')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif


        <!-- Book Us Start -->
        <div class="container-fluid contact py-6 wow bounceInUp" data-wow-delay="0.1s">
            <div class="container">
                <div class="col-12 text-start mt-3 mb-3">
            <a  href="{{ route('fronthome') }}"><button  class="btn btn-primary px-5 py-3 rounded-pill">الصفحة الرئيسية </button></a>
        </div>
                <div class="row g-0">
                    <div class="col-1">
                        <img src="{{url('public/frontend/assets/img/play.jpg')}}" class="img-fluid h-100 w-100 rounded-start" style="object-fit: cover; opacity: 0.7;" alt="">
                    </div>
                    <div class="col-10">
                        <div class="border-bottom border-top border-primary bg-light py-5 px-4">
                            <div class="text-center">
                                <small class="d-inline-block fw-bold text-dark text-uppercase bg-light border border-primary rounded-pill px-4 py-1 mb-3">تسجيل اللاعب</small>
                                <h1 class="display-5 mb-5">سجل بياناتك</h1>
                            </div>


                            <form action="{{ route('players.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                            <div class="row g-4 form">

                                <div class="col-lg-6 col-md-6">
                                    <div class="image-upload-container">
                                        <label for="personal_image" class="form-label">صوره شخصية</label>
                                        <input name="image" id="image" type="file" accept=".xlsx,.xls,image/*,.doc,audio/*,.docx,video/*,.ppt,.pptx,.txt,.pdf" class="form-control">
                                        @error('image')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                        {{-- <img id="image-preview1" class="image-preview" src="#" alt="صوره شخصية"> --}}
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6">
                                    <div class="image-upload-container">
                                        <label for="birth_image" class="form-label">صوره شهاده الميلاد</label>
                                        <input name="birth_image" id="birth_image" type="file" accept=".xlsx,.xls,image/*,.doc,audio/*,.docx,video/*,.ppt,.pptx,.txt,.pdf" class="form-control">
                                        @error('birth_image')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                        {{-- <img id="image-preview2" class="image-preview" src="#" alt="صوره شخصية"> --}}
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-6">
                                    <input type="text"  name="name"  class="form-control border-primary p-2" placeholder="الاسم ثلاثي">
                                    @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <input type="text"  name="phone"  class="form-control border-primary p-2" placeholder="رقم الموبايل">
                                    @error('phone')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <input type="date" name="birthday" class="form-control border-primary p-2" placeholder="تاريخ الميلاد">
                                    @error('birthday')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-lg-4 col-md-6">
                                    <input type="text" name="birthyear" class="form-control border-primary p-2" placeholder="سنة الميلاد">
                                    @error('birthyear')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                                </div>


                                <div class="col-lg-4 col-md-6">
                                    <select name="governorate" class="form-select border-primary p-2" aria-label="Default select example" id="governorate">
                                        @foreach ($governorates as $governorate)
                                        <option value="{{ $governorate }}">{{ $governorate }}</option>
                                        @endforeach
                                    </select>
                                    @error('governorate')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <select name="branch" class="form-select border-primary p-2" aria-label="Default select example" id="governorate">
                                        @foreach ($branches as $branch)
                                        <option value="{{ $branch->id }}">{{ $branch->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('governorate')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-lg-4 col-md-6">
                                    <select class="form-select border-primary p-2" aria-label="Default select example" id="role" name="role" >
                                            @foreach ($roles as $role)
                                            <option value="{{ $role->id }}">{{ $role->name}}</option>
                                            @endforeach
                                    </select>
                                        @error('role')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                </div>

                            
                                <div class="col-12 text-center">
                                    <button type="submit" class="btn btn-primary px-5 py-3 rounded-pill">تسجيل</button>
                                </div>
                            </div>
                        </form>
                        </div>
                    </div>
                    <div class="col-1">
                        <img src="{{url('public/frontend/assets/img/play.jpg')}}" class="img-fluid h-100 w-100 rounded-end" style="object-fit: cover; opacity: 0.7;" alt="">
                    </div>
                </div>
            </div>
        </div>
        <!-- Book Us End -->



@section('script')
<script>
    document.getElementById('image1').addEventListener('change', function(event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                const img = document.getElementById('image-preview1');
                img.src = e.target.result;
                img.style.display = 'block';
            }
            reader.readAsDataURL(file);
        }
    });

    document.getElementById('image2').addEventListener('change', function(event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                const img = document.getElementById('image-preview2');
                img.src = e.target.result;
                img.style.display = 'block';
            }
            reader.readAsDataURL(file);
        }
    });
</script>
@endsection






