@extends('backend.inc.master')
@section('title', 'تعديل اختبار ')
@section('content')

<!--breadcrumb-->
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3">جميع الاختبارات</div>
    <div class="ps-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a></li>
                <li class="breadcrumb-item active" aria-current="page">تعديل اختبار</li>
            </ol>
        </nav>
    </div>
</div>
<!--end breadcrumb-->

<div class="card">
    <div class="card-body p-4">
        <h5 class="card-title">تعديل اختبار</h5>
        <hr/>
        <div class="form-body mt-4">
            <form class="form" action="{{ route('exams.update', $exam->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="col-lg-12">
                        <div class="border border-3 p-4 rounded">
                            <div class="row g-3">

                                <div class="col-6">
                                    <label for="inputVendor" class="form-label">اسم الاختبار</label>
                                    <input type="text" name="name" class="form-control" id="inputProductTags" value="{{ $exam->name }}" placeholder="اسم الاختبار">
                                </div>
                                <div class="col-6">
                                    <label for="inputVendor" class="form-label">المكان</label>
                                    <input type="text" name="location" class="form-control" id="inputProductTags" value="{{ $exam->location }}" placeholder="المكان">
                                </div>

                                <div class="mb-12">
                                    <div class="mb-6">
                                        <span for="inputVendor" class="form-label">الوقت</span>
                                        <select class="form-select" name="timee" id="inputVendor">
                                            <option></option>
                                            @foreach ($timeOfdates as $ta)
                                                <option value="{{ $ta->timee }}" {{ $exam->timee == $ta->timee ? 'selected' : '' }}>{{ $ta->timee }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-12">
                                    <div class="mb-6">
                                        <span for="inputVendor" class="form-label">التاريخ</span>
                                        <select class="form-select" name="datee" id="inputVendor">
                                            <option></option>
                                            @foreach ($timeOfdates as $da)
                                                <option value="{{ $da->datee }}" {{ $exam->datee == $da->datee ? 'selected' : '' }}>{{ $da->datee }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <label for="inputVendor" class="form-label">الفرع</label>
                                    <select class="form-select" name="branch" id="inputVendor">
                                        <option></option>
                                        @foreach($branches as $branch)
                                            <option {{ $branch->id == $exam->branch_id ? 'selected' : '' }} value="{{ $branch->id }}">{{ $branch->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                          
                                </div>

                                <div class="col-12 m-6">
                                    <label for="inputStatus" class="form-label">الحالة</label>
                                    <input type="hidden" name="status" id="status" value="{{ $exam->status }}">
                                    <button type="button" class="btn {{ $exam->status ? 'btn-primary' : 'btn-outline-primary' }}" id="statusButton">{{ $exam->status ? 'تم تحديد موعد الامتحان' : 'لم يتم تحديد موعد الامتحان' }}</button>
                                </div>

                                <div class="d-grid col-12">
                                    <button type="submit" class="btn btn-primary">حفظ</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!--end row-->
            </form>
        </div>
    </div><!--end row-->
</div>

<script>
document.getElementById('statusButton').addEventListener('click', function() {
    var statusInput = document.getElementById('status');
    if (statusInput.value == "0") {
        statusInput.value = "1";
        this.classList.remove('btn-outline-primary');
        this.classList.add('btn-primary');
        this.textContent = 'تم تحديد موعد الامتحان ';
    } else {
        statusInput.value = "0";
        this.classList.remove('btn-primary');
        this.classList.add('btn-outline-primary');
        this.textContent = 'لم يتم تحديد موعد الامتحان ';
    }
});
</script>

@endsection
