<!doctype html>
<html lang="en" dir="rtl">
@include('backend.inc.head')

<body>
<div class="wrapper">
    @include('backend.inc.sidebar')
    @include('backend.inc.header')
    <div class="page-wrapper">
        <div class="page-content">
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">بروفايل اللاعب</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a></li>
                            <li class="breadcrumb-item active" aria-current="page">بروفايل اللاعب</li>
                        </ol>
                    </nav>
                </div>
            </div>
 <!-- Toastr Notification -->
@if(session('error'))
    <script>
        toastr.error("{{ session('error') }}");
    </script>
@endif
            <div class="container">
                
                <div class="main-body">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex flex-column align-items-center text-center">
                                        <img src="{{ url('public/players/' .$player->personal_image) }}" alt="Admin" class="rounded-circle p-1 bg-primary" width="250">
                                        <div class="mt-3">
                                            <h4>الصوره الشخصيه</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="d-flex flex-column align-items-center text-center">
                                        <img src="{{ url('public/players/' .$player->birth_image) }}" alt="Admin" class="rounded-circle p-1 bg-primary" width="250">
                                        <div class="mt-3">
                                            <h4>صورة الميلاد</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="card" id="playerCard">
                                <div class="card-body">
                                    <div class="toolbar hidden-print">
                                        <div class="text-end">
                                            <button type="button" class="btn btn-dark" onclick="printCard()"><i class="fa fa-print"></i> Print</button>
                                        </div>
                                        <hr/>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">اسم اللاعب</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" class="form-control" value="{{$player->name}}" />
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">رقم التليفون</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="phone" class="form-control" value="{{$player->phone}}" />
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">الفرع </h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="phone" class="form-control" value="{{$player->branch->name}}" />
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">المحافظه</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" class="form-control" value="{{$player->governorate}}" />
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">مركز اللاعب</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" class="form-control" value="{{$player->role->name}}" />
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">سنة الميلاد</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" class="form-control" value="{{$player->birth->birthyear}}" />
                                        </div>
                                    </div>

                                </div>
                                <div class="bg-primary p-3">
                                    <h5 class="mb-0  font-weight-bold text-center">الاختبارات</h5>
                                </div>
                                <br>
                                <form id="examForm" action="{{ route('results.store') }}" method="post">
                                    @csrf
                                    <div class="col">
                                        @foreach ($exams as $exam)
                                        <div class="card border-primary border-bottom border-3 border-0 exam-card" data-exam-id="{{ $exam->id }}">
                                            <div class="card-body">
                                                @if($exam->status == 1)
                                                
                                                <span class="m-3 fw-bold card-text">الاختبار:{{ $exam->name}}</span>
                                                <span class="m-3 fw-bold card-text">الوقت:لم يتم تحديد وقت الامتحان </span>
                                                <span class="m-3 fw-bold card-text">التاريخ:لم يتم تحديد موعد الامتحان </span>

                                                @elseif($exam->status == 0)
                                                <span class="m-3 fw-bold card-text">الاختبار:{{ $exam->name }}</span>
                                                 <span class="m-3 fw-bold card-text">الوقت:{{ \Carbon\Carbon::parse($exam->timee)->format('h:i A') }}</span>
                                                <span class="m-3 fw-bold card-text">التاريخ:{{ $exam->datee }}     </span>
                                                <span class="m-3 fw-bold card-text">المكان:{{ $exam->location }}</span>

                                                @endif
                                                <hr>
                                                <div class="d-flex align-items-center gap-2">
                                                    <button type="button" class="btn btn-success status-btn" data-status="ناجح" data-exam-id="{{ $exam->id }}">ناجح</button>
                                                    <button type="button" class="btn btn-danger status-btn" data-status="راسب" data-exam-id="{{ $exam->id }}">راسب</button>
                                                    <button type="button" class="btn btn-warning status-btn" data-status="غياب" data-exam-id="{{ $exam->id }}">غياب</button>
                                                    <div id="result-{{ $exam->id }}" class="ms-3 fw-bold"></div>
                                                </div>
                                                </div>

                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                    <input type="hidden" name="exam_id" id="exam_id" value="">
                                    <input type="hidden" name="player_id" value="{{ $player->id }}">
                                    <input type="hidden" name="status" id="status" value="">
                                </form>
                            </div>
                        </div>
                    </div>


                    </div>

                </div>
            </div>
        </div>
    </div>

    @include('backend.inc.footer')


{{-- <script>
    function printCard() {
        var card = document.getElementById('playerCard');
        var printWindow = window.open('', '_blank', 'width=800,height=600');
        printWindow.document.write('<html><head><title>Print Card</title>');
        printWindow.document.write('<link rel="stylesheet" type="text/css" href="path/to/your/css/file.css">'); // Add path to your CSS file if needed
        printWindow.document.write('</head><body >');
        printWindow.document.write(card.outerHTML);
        printWindow.document.write('</body></html>');
        printWindow.document.close();
        printWindow.print();
    }
</script> --}}
<script>
document.addEventListener('DOMContentLoaded', function () {
    const playerId = {{ $player->id }}; // تأكد من تمرير معرف اللاعب الصحيح هنا
    let currentExamIndex = 0;
    const examCards = document.querySelectorAll('.exam-card');


//     let indexexamcard = 0;
//     let examcardT = document.querySelectorAll(".exam-card");
//    for(i= indexexamcard ; i < examcardT.length ; i++){
//     examcardT[1].style.background = "red"
//    }


    // Load saved exam states for the current player
    examCards.forEach((card, index) => {
        const examId = card.getAttribute('data-exam-id');
        const savedStatus = localStorage.getItem(`player-${playerId}-exam-${examId}-status`);

        if (savedStatus) {
            card.querySelectorAll('.status-btn').forEach(btn => btn.style.display = 'none');
            const resultDiv = document.getElementById(`result-${examId}`);
            resultDiv.textContent = `النتيجة: ${savedStatus}`;
        } else {
            if (index !== 0) {
                card.style.display = 'block';
            }
        }
    });

    function showNextExam() {
        if (currentExamIndex < examCards.length - 1) {
            currentExamIndex++;
            examCards.forEach((card, index) => {
                card.style.display = (index === currentExamIndex) ? 'block' : 'none';
            });
        }
    }

    document.querySelectorAll('.status-btn').forEach(button => {
        button.addEventListener('click', function () {
            const status = this.getAttribute('data-status');
            const examId = this.getAttribute('data-exam-id');

            // Hide status buttons and show result
            this.closest('.card-body').querySelectorAll('.status-btn').forEach(btn => btn.style.display = 'none');
            const resultDiv = document.getElementById(`result-${examId}`);
            resultDiv.textContent = `النتيجة: ${status}`;

            console.log("TTTTTTTTT" , resultDiv);

            if(resultDiv.textContent == ""){
                    resultDiv.nextElementSibling.style.display = "none";
                }

            // Save the status in localStorage
            localStorage.setItem(`player-${playerId}-exam-${examId}-status`, status);

            // Move to the next exam
            showNextExam();

            // Submit the form
            const form = document.getElementById('examForm');
            document.getElementById('exam_id').value = examId;
            document.getElementById('status').value = status;
            form.submit();
        });
    });
});
</script>

</body>
</html>




















