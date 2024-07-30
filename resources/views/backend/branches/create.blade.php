@extends('backend.inc.master')
@section('title', 'إضافة فرع ')
@section('content')

        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">جميع الفروع</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">اضافة فرع  </li>
                    </ol>
                </nav>
            </div>
        </div>
        <!--end breadcrumb-->

        <div class="card">
          <div class="card-body p-4">
              <h5 class="card-title">اضافة  فرع </h5>
              <hr/>
               <div class="form-body mt-4">
                   <form class="form" action="{{ route('branches.store') }}" method="post"
                         enctype="multipart/form-data">
                       @csrf

                       <div class="row">
                           <div class="col-lg-12">
                               <div class="border border-3 p-4 rounded">
                                   <div class="row g-3">

                                       <div class="col-6">
                                           <label for="inputVendor" class="form-label">اسم الفرع</label>
                                           <input type="text" name="name"  class="form-control" id="inputProductTags" placeholder="اسم الفرع">
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
          </div>
      </div>


@endsection
