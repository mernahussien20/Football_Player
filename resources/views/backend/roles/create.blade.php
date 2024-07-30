@extends('backend.inc.master')
@section('title', 'إضافة مركز للاعب ')
@section('content')

        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">جميع المراكز</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">اضافة مركز للاعب  </li>
                    </ol>
                </nav>
            </div>
        </div>
        <!--end breadcrumb-->

        <div class="card">
          <div class="card-body p-4">
              <h5 class="card-title">اضافة  مركز </h5>
              <hr/>
               <div class="form-body mt-4">
                   <form class="form" action="{{ route('roles.store') }}" method="post"
                         enctype="multipart/form-data">
                       @csrf

                       <div class="row">
                           <div class="col-lg-12">
                               <div class="border border-3 p-4 rounded">
                                   <div class="row g-3">

                                       <div class="col-6">
                                           <label for="inputVendor" class="form-label">مركز الاعب </label>
                                           <input type="text" name="name"  class="form-control" id="inputProductTags" placeholder="اسم المركز">
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
