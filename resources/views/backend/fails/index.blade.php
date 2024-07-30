@extends('backend.inc.master')
@section('title', 'جميع اللاعبين')
@section('content')

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

<h6 class="mb-0 text-uppercase">جميع اللاعبين الراسبين </h6>
<hr />

<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table id="playersTable" class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>الاسم</th>
                            
                    <th>العمليات</th>
                </tr>
                </thead>
                <tbody>
                @foreach($players as $player)
                    <tr>
                        <td>{{ $player->name }}</a></td>
                      
                        <td>
                            <a href="{{ route('Restore_Player', $player->id) }}"><button type="button" class="btn btn-success" >استرجاع</button> </a>
                            <a href="" data-bs-toggle="modal" data-bs-target="#exampleDangerModal{{ $player->id }}"><button type="button" class="btn btn-danger" >مسح نهائى</button></a>
                        </td>
                    </tr>
                    {{-- Start Modal --}}
                    <div class="modal fade" id="exampleDangerModal{{ $player->id }}" tabindex="-1" aria-hidden="true">
                        <form action="{{ route('finaldestroy', $player->id) }}" method="POST">
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
                                            {{ $player->name }}
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



