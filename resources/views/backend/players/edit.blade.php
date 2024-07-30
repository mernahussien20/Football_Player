@extends('backend.inc.master')
@section('title', 'تعديل لاعب')
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
   
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">جميع اللاعبين</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">تعديل لاعب</li>
                </ol>
            </nav>
        </div>
    </div>
    <!--end breadcrumb-->

    <div class="card">
        <div class="card-body p-4">
            <h5 class="card-title">تعديل لاعب </h5>
            <hr/>
            <div class="form-body mt-4">
                <form class="form" action="{{ route('players.update',$player->id) }}" method="post"
                    enctype="multipart/form-data">
                  @csrf
                  @method('put')
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="border border-3 p-4 rounded">
                                <div class="mb-6">
                                    <label for="inputProductTitle" class="form-label">اسم اللاعب</label>
                                    <input type="text" name="name" class="form-control" id="inputProductTitle"
                                    value="{{$player->name}}"   placeholder="أسم اللاعب">
                                </div>
                                <div class="mb-6">
                                    <span for="inputVendor" class="form-label"> المحافظه</span>
                                    <select class="form-select" name="governorate" id="inputVendor">
                                            @foreach ($governorates as $governorate)
                                                <option value="{{ $governorate }}" {{ $player->governorate == $governorate ? 'selected' : '' }}>{{ $governorate }}</option>
                                            @endforeach
                                        </select>
                                </div>
                               

                                <div class="mb-12">
                                    <div class="col-12">
                                        <label for="inputProductTags" class="form-label">رقم التليفون</label>
                                        <input type="text" name="phone" class="form-control" id="inputProductTags"
                                        value="{{$player->phone}}"     placeholder="رقم التليفون">
                                        @error('phone')
                                        <div class="text-danger">{{ $message }}</div>
                                         @enderror
                                    </div>
                               </div>
                               <div class="mb-12">
                                <div class="col-12">
                                    <label for="inputProductTags" class="form-label">تاريخ الميلاد </label>
                                    <input type="date" name="birthday" class="form-control" id="inputProductTags"
                                    value="{{$player->birthday}}"    placeholder="تاريخ الميلاد ">
                                </div>
                           </div>
                           <div class="mb-6">
                            <span for="inputVendor" class="form-label"> مركز الاعب</span>
                            <select class="form-select" name="role" id="inputVendor">
                                    @foreach ($roles as $role)
                                    <option  {{ $role->id == $player->role_id ? 'selected' : ''  }} value="{{$role->id}}">{{$role->name}}</option>
                                    @endforeach
                                </select>
                        </div>
                        <div class="mb-6">
                            <span for="inputVendor" class="form-label"> الفرع </span>
                            <select class="form-select" name="branch" id="inputVendor">
                                    @foreach ($branches as $branch)
                                    {{-- <option value="{{ $branch->id }}">{{ $branch->name}}</option> --}}
                                    <option  {{ $branch->id == $player->branch_id ? 'selected' : ''  }} value="{{$branch->id}}">{{$branch->name}}</option>
                                    @endforeach
                                </select>
                        </div>

                        

                          <div class="mb-12">
                            <div class="col-12">
                                <label for="inputProductTags" class="form-label">سنة الميلاد</label>
                                <input type="year" name="birthyear" class="form-control" id="inputProductTags"
                                value="{{$player->birth->birthyear}}"  placeholder="سنة الميلاد">
                                @error('birthyear')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                          </div>
                          
                          <div class="row mt-3">
                         <div class="col-6">
                        <label for="inputProductDescription" class="form-label">الصورة الشخصية</label>
                        <div class="imageuploadify well">
                            <div class="imageuploadify-overlay">
                                <i class="fa fa-picture-o"></i>
                            </div>
                            <div class="imageuploadify-images-list text-center">
                                <i class="bx bxs-cloud-upload"></i>
                                <span class="imageuploadify-message">اسحب وأسقط الملفات للرفع هنا</span>
                                <button type="button" class="btn btn-default" onclick="document.getElementById('getFile').click()">أو اختر ملفًا للرفع
                                    <input onchange="readURL(this);" id="getFile" class="w-100" style="display: none" type="file" name="image">
                                </button>
                                <div id="imagepre" class="imageuploadify-details" style="opacity: 1;">
                                    <img id="blah" src="{{ asset('public/players/' . $player->personal_image) }}" alt="Your File(s) Here"  style="max-width: 200px;">
                                </div>
                            </div>
                        </div>
                    </div>
               
                       
                         <div class="col-6">
                        <div class="mb-3">
                            <label for="inputProductDescription" class="form-label">صورة شهادة الميلاد</label>
                            <div class="imageuploadify well">
                                <div class="imageuploadify-images-list text-center">
                                    <i class="bx bxs-cloud-upload"></i>
                                    <span class="imageuploadify-message">اسحب وأسقط الملفات للرفع هنا</span>
                                    <button type="button" class="btn btn-default" onclick="document.getElementById('getFileBirth').click()">أو اختر ملفًا للرفع
                                        <input onchange="readURLBirth(this);" id="getFileBirth" class="w-100" style="display: none" type="file" name="birth_image[]">
                                    </button>
                                    <div id="imagepreBirth" class="imageuploadify-details" style="opacity: 1;">
                                        <img id="blahBirth" src="{{ asset('public/players/' . $player->birth_image) }}"  style="max-width: 200px;" alt="صورة شهادة الميلاد">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                           </div>
                            </div>
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">حفظ</button>
                        </div>
                    </div>
                </form>
            </div><!--end row-->

        </div>
    </div>



@endsection

@section('scripts')
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah')
                        .attr('src', e.target.result)
                        .width(100)
                        .height(100);

                    $('#imagepre').css('opacity', '1'); // تصحيح وضع الشفافية
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endsection
