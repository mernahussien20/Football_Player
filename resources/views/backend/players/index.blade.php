@extends('backend.inc.master')

@section('title', 'جميع اللاعبين')

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

    <h6 class="mb-0 text-uppercase">جميع اللاعبين</h6>
    <hr />
    <div class="card">
        <div class="card-body">
            <div class="row g-3 align-items-center">
                <!-- Select Box 1 -->
                <div class="col-12 col-md-6 col-lg-3 d-flex">
                    <div class="flex-grow-1">
                        <select class="form-select filter-select" id="inputBirthYear">
                            <option value="">سنة الميلاد</option>
                            @foreach ($births as $birth)
                                <option value="{{ $birth }}">{{ $birth }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <!-- Select Box 2 -->
                <div class="col-12 col-md-6 col-lg-3 d-flex">
                    <div class="flex-grow-1">
                        <select class="form-select filter-select" id="inputRole">
                            <option value="">مراكز اللاعيبة</option>
                            @foreach ($roles as $role)
                                <option value="{{ $role->name }}">{{ $role->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <!-- Select Box 3 -->
                <div class="col-12 col-md-6 col-lg-3 d-flex">
                    <div class="flex-grow-1">
                        <select class="form-select filter-select" id="inputGovernorate">
                            <option value="">المحافظة</option>
                            @foreach ($governorates as $governorate)
                                <option value="{{ $governorate }}">{{ $governorate }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <!-- Select Box 4 -->
                <div class="col-12 col-md-6 col-lg-3 d-flex">
                    <div class="flex-grow-1">
                        <select class="form-select filter-select" id="inputBranch">
                            <option value="">الفرع</option>
                            @foreach ($branches as $branch)
                                <option value="{{ $branch->name }}">{{ $branch->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

            </div><!--end row-->
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="playersTable" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>الاسم</th>
                            <th>مركز اللاعب</th>
                            <th>رقم الموبايل</th>
                            <th>المحافظة</th>
                            <th>سنة الميلاد</th>
                            <th>الفرع</th>
                            <th>تاريخ الميلاد</th>
                            <th>الصورة الشخصية</th>
                            <th>صورة الميلاد</th>
                            <th>العمليات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($players as $player)
                            <tr>
                                <td><a href="{{ route('players.show', $player->id) }}">{{ $player->name }}</a></td>
                                <td>{{ $player->role->name }}</td>
                                <td>{{ $player->phone }}</td>
                                <td>{{ $player->governorate }}</td>
                                <td>{{ $player->birth->birthyear }}</td>
                                <td>{{ $player->branch->name }}</td>
                                <td>{{ $player->birthday }}</td>
                                <td><img src="{{ url('public/players/' . $player->personal_image) }}" width="50" height="50" alt=""></td>
                                <td><img src="{{ url('public/players/' . $player->birth_image) }}" width="50" height="50" alt=""></td>
                                <td>
                                    <a href="{{ route('players.edit', $player->id) }}"><i class="text-primary" data-feather="edit"></i></a>
                                    <a href="" data-bs-toggle="modal" data-bs-target="#exampleDangerModal{{ $player->id }}"><i class="text-primary" data-feather="delete"></i></a>
                                </td>
                            </tr>
                            {{-- Start Modal --}}
                            <div class="modal fade" id="exampleDangerModal{{ $player->id }}" tabindex="-1" aria-hidden="true">
                                <form action="{{ route('players.destroy', $player->id) }}" method="POST">
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
                <p id="noDataMessage" class="text-center" style="display: none;">لا يوجد بيانات مطابقة للبحث</p>
         
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const filters = document.querySelectorAll('.filter-select');
            const table = document.getElementById('playersTable');
            const rows = table.querySelectorAll('tbody tr');
            const noDataMessage = document.getElementById('noDataMessage');

            function filterTable() {
                const birthYear = document.getElementById('inputBirthYear').value.toLowerCase();
                const role = document.getElementById('inputRole').value.toLowerCase();
                const governorate = document.getElementById('inputGovernorate').value.toLowerCase();
                const branch = document.getElementById('inputBranch').value.toLowerCase();

                let hasVisibleRows = false;

                rows.forEach(row => {
                    const birthYearText = row.cells[4].textContent.toLowerCase();
                    const roleText = row.cells[1].textContent.toLowerCase();
                    const governorateText = row.cells[3].textContent.toLowerCase();
                    const branchText = row.cells[5].textContent.toLowerCase();

                    if (
                        (birthYear === '' || birthYearText.includes(birthYear)) &&
                        (role === '' || roleText.includes(role)) &&
                        (governorate === '' || governorateText.includes(governorate)) &&
                        (branch === '' || branchText.includes(branch))
                    ) {
                        row.style.display = '';
                        hasVisibleRows = true;
                    } else {
                        row.style.display = 'none';
                    }
                });

                noDataMessage.style.display = hasVisibleRows ? 'none' : 'block';
            }

            filters.forEach(filter => {
                filter.addEventListener('change', filterTable);
            });
        });
    </script>

@endsection
