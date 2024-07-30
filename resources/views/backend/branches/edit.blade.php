@extends('backend.inc.master')
@section('title',  "تعديل الفرع")
@section('content')

    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">  تعديل الفرع </div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    
                    <li class="breadcrumb-item active" aria-current="page">تعديل الفرع</li>
                </ol>
            </nav>
        </div>
    </div>
    <!--end breadcrumb-->

    <div class="card">
        <div class="card-body p-4">
            <h5 class="card-title">تعديل المادة  </h5>
            <hr/>
                <form class="form" action="{{ route('branches.update',$branch->id) }}" method="post"
                      enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="border border-3 p-4 rounded">
                                <div class="row g-3">

                                    <div class="col-6">
                                        <label for="inputVendor" class="form-label">اسم الفرع </label>
                                        <input type="text" name="name" value="{{$branch->name}}" class="form-control" id="inputProductTags" placeholder=" اسم الفرع ">
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
