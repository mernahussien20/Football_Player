@extends('backend.inc.master')
@section('title', 'جميع المراكز ')
@section('content')

    <h6 class="mb-0 text-uppercase">جميع المراكز</h6>
    <hr />
    <div class="card">
        <div class="card-body">
            @if (session('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif
            <div class="table-responsive">
                <table id="example2" class="table table-striped table-bordered">
                    <thead>
                    <tr>
                    <tr>
                        <th>اسم المركز</th>
                      
                        <th>العمليات</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($roles as $role)
                        <tr>
                            <td>{{$role->name}}</td>
                           
                            <td>
                                <a href="{{ route('roles.edit' , $role->id) }}"><i class="text-primary" data-feather="edit"></i></a>
                                <a href="" data-bs-toggle="modal" data-bs-target="#exampleDangerModal{{$role->id}}"><i class="text-primary" data-feather="delete"></i></a>
                            </td>
                        </tr>
                        {{-- Start Modal --}}
                        <div class="modal fade" id="exampleDangerModal{{$role->id}}" tabindex="-1" aria-hidden="true">
                            <form action="{{ route('roles.destroy', $role->id) }}" method="POST">
                                @csrf
                                @method('delete')
                                <div class="modal-dialog modal-lg modal-dialog-centered">
                                    <div class="modal-content bg-danger">
                                        <div class="modal-header">
                                            <h5 class="modal-title text-white">تأكيد الحذف !</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body text-white">
                                            <p>
                                                : هل أنت متأكد من حذف
                                                {{$role->name}}
                                                ؟
                                            </p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">الغاء</button>
                                            <button type="submit" class="btn btn-dark">تأكيد الحذف</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        {{-- End Modal --}}
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection



