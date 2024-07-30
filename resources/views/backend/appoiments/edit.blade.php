@extends('backend.inc.master')
@section('title',  "تعديل المواعيد")
@section('content')

    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">  تعديل المواعيد </div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    
                    <li class="breadcrumb-item active" aria-current="page">تعديل المواعيد</li>
                </ol>
            </nav>
        </div>
    </div>
    <!--end breadcrumb-->

    <div class="card">
        <div class="card-body p-4">
            <h5 class="card-title">تعديل المادة  </h5>
            <hr/>
                <form class="form" action="{{ route('dates.update',$da->id) }}" method="post"
                      enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="border border-3 p-4 rounded">
                                <div class="row g-3">

                                    <div class="col-6">
                                        <label for="inputVendor" class="form-label">الوقت  </label>
                                        <input type="text" name="timee" value="{{$da->timee}}" class="form-control" id="inputProductTags" placeholder=" الوقت  ">
                                    </div>
                                    <div class="col-6">
                                        <label for="inputVendor" class="form-label">التاريخ  </label>
                                        <input type="text" name="datee" value="{{$da->datee}}" class="form-control" id="inputProductTags" placeholder=" التاريخ  ">
                                    </div>

                                    <div class="d-grid col-12">
                                        <button type="submit" class="btn btn-primary">حفظ</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </form>
            </div>
        </div>



@endsection
