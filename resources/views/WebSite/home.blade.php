
 
@extends('WebSite.inc.master')
@section('title', ' HomePage')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2>Player Results</h2>
            <p><strong>Player Name:</strong> {{ $player->name }}</p>
            <table class="table">
                <thead>
                    <tr>
                        <th>Exam Name</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($results as $result)
                        @if(($result->status == 0))
                        <tr>
                            <td>{{ $result->exam->name }}</td>
                            <td>Fail</td>
                            <td>لم يتم اجتياز الامتحان</td>
                        </tr>
                        @break
                        @elseif(empty($result->status))
                        <tr>
                            <td>{{ $result->exam->name }}</td>
                            <td>لم يمتحن بعد</td>
                            <td></td>
                        </tr> 
                        @else
                            <tr>
                                <td>{{ $result->exam->name }}</td>
                                <td>Pass</td>
                                <td>
                                    <a href="{{ route('next.exam', ['player_id' => $player->id, 'current_exam_id' => $result->exam->id]) }}" class="btn btn-primary">
                                        Show Next Exam
                                    </a>
                                </td>
                            </tr>

                     @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection