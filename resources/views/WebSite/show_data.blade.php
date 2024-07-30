@extends('WebSite.inc.master')
@section('title', 'Data Show')
@section('content')

<!-- About Start -->
<div class="container-fluid py-6">
    <div class="container">
        <div class="row g-5 align-items-center">
            <div class="col-lg-5 wow bounceInUp" data-wow-delay="0.1s">
                <img src="{{ asset('players/' . $player->personal_image) }}" class="img-fluid rounded" alt="">
            </div>
            <div class="col-lg-7 wow bounceInUp" data-wow-delay="0.3s" style="text-align: right;">
                <h5 class="display-5 mb-4">اسم اللاعب: {{ $player->name }}</h5>
                <p class="mb-4">
                    <strong>الهاتف:</strong> {{ $player->phone }}<br>
                    <strong>تاريخ الميلاد:</strong> {{ \Carbon\Carbon::parse($player->birthday)->format('d-m-Y') }}<br>
                    <strong>المحافظة:</strong> {{ $player->governorate }}<br>
                    <strong>مركز اللاعب:</strong> {{ $player->role->name }}<br>
                    <strong>الفرع:</strong> {{ $player->branch->name }}<br>
                </p>

                <div class="tab-content">
                    <div id="tab-6" class="tab-pane fade show p-0 active">
                        <div class="row g-4">
                            <div class="col-lg-12">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>النتيجة</th>
                                            <th>الامتحان</th>
                                            <th>الإجراءات</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if($firstExam)
                                            <tr>
                                                <td colspan="3">
                                                   <strong>اسم الامتحان: {{ $firstExam->name }}</strong><br>
                                                        <strong>التاريخ : {{ \Carbon\Carbon::parse($firstExam->datee)->format('d-m-Y') }}</strong><br>
                                                        <strong> الوقت:{{ \Carbon\Carbon::parse($firstExam->timee)->format('H:i A') }}</strong><br>
                                                        <strong>المكان: {{ $firstExam->location }} </strong>
                                                </td>
                                            </tr>
                                     @endif



                                        @foreach($results as $result)
                                            <tr id="exam-{{ $result->exam->id }}">
                                                <td>{{ $result->pass ? 'ناجح' : ($result->fail ? 'راسب' : 'غياب') }}</td>
                                                <td>{{ $result->exam->name }}</td>
                                                <td>
                                                    @if($result->pass)
                                                        <button type="button" class="btn btn-primary btn-show-next-exam" data-exam-id="{{ $result->exam->id }}">عرض الامتحان</button>
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr id="next-exam-{{ $result->exam->id }}" style="display: none;">
                                                <td colspan="3"></td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- About End -->

<script>
document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.btn-show-next-exam').forEach(button => {
        button.addEventListener('click', function() {
            const examId = this.dataset.examId;

            fetch(`{{ route('getNextExam') }}`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ exam_id: examId })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    const row = document.getElementById(`next-exam-${examId}`);
                    row.style.display = '';
                    if (data.nextExam.status == 1) {
                        row.innerHTML = `<td colspan="3">${data.nextExam.message}</td>`;
                    } else {
                        const nextExam = data.nextExam;
                        row.innerHTML = `
                            <td colspan="3">
                                <strong>اسم الامتحان:</strong> {{ $firstExam->name }}<br>
                                                        <strong>التاريخ : {{ \Carbon\Carbon::parse($firstExam->datee)->format('d-m-Y') }}</strong><br>
                                                        <strong>{{ \Carbon\Carbon::parse($firstExam->timee)->format('H:i A') }}</strong><br>
                                                        <strong>المكان: {{ $firstExam->location }} </strong>
                            </td>
                        `;
                    }
                }
            });
        });
    });
});
</script>

@endsection















































