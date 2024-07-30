@extends('backend.inc.master')
@section('title', 'إضافة لاعب')
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
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a></li>
                    <li class="breadcrumb-item active" aria-current="page">اضافة لاعب</li>
                </ol>
            </nav>
        </div>
    </div>
    <!--end breadcrumb-->

    <div class="card">
        <div class="card-body p-4">
            <h5 class="card-title">اضافة لاعب جديد</h5>
            <hr/>
            <div class="form-body mt-4">
                <form class="form" action="{{ route('players.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="border border-3 p-4 rounded">
                                <div class="mb-6">
                                    <label for="inputProductTitle" class="form-label">الأسم</label>
                                    <input type="text" name="name" class="form-control" id="inputProductTitle" placeholder="أسم الطالب">
                                    @error('name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-6">
                                    <span for="inputVendor" class="form-label"> المحافظه</span>
                                    {{-- <select class="form-select" name="governorate" id="inputVendor">
                                        @foreach ($governorates as $governorate)
                                            <option value="{{ $governorate }}">{{ $governorate }}</option>
                                        @endforeach
                                    </select> --}}
                                </div>
                                <div class="mb-12">
                                    <div class="col-12">
                                        <label for="inputProductTags" class="form-label">رقم التليفون</label>
                                        <input type="text" name="phone" class="form-control" id="inputProductTags" placeholder="رقم التليفون">
                                        @error('phone')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="mb-12">
                                    <div class="col-12">
                                        <label for="inputProductTags" class="form-label">تاريخ الميلاد</label>
                                        <input type="date" name="birthday" class="form-control" id="inputProductTags" placeholder="تاريخ الميلاد">
                                        @error('birthday')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="mb-12">
                                    <div class="mb-6">
                                        <span for="inputVendor" class="form-label"> مركز اللاعب</span>
                                        <select class="form-select" name="role" id="inputVendor">
                                            @foreach ($roles as $role)
                                                <option value="{{ $role->id }}">{{ $role->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-12">
                                    <div class="col-12">
                                        <label for="inputProductTags" class="form-label">سنة الميلاد</label>
                                        <input type="year" name="birthyear" class="form-control" id="inputProductTags" placeholder="سنة الميلاد">
                                        @error('birthyear')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="image-uploadify" class="form-label">الصورة</label>
                                    <input id="image-uploadify" name="image" type="file" accept=".xlsx,.xls,image/*,.doc,audio/*,.docx,video/*,.ppt,.pptx,.txt,.pdf">
                                </div>
                                <div class="mb-3">
                                    <label for="birth-image-uploadify" class="form-label">الصورة الميلاد</label>
                                    <input id="birth-image-uploadify" name="birth_image" type="file" accept=".xlsx,.xls,image/*,.doc,audio/*,.docx,video/*,.ppt,.pptx,.txt,.pdf">
                                </div>
                            </div>
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">حفظ</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

