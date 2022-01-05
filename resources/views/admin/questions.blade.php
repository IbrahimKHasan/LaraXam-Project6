@extends('layouts.admin.master')
@section('title', 'Manage Questions')
@section('question-active', 'class=mm-active')
@section('content')
<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="col-lg-12">
            <div class="main-card mb-3 card">
                <div class="card-body">
                    <h5 class="card-title">Add Questions</h5>
                    @include('alerts.success')
                    <form method="POST" action="{{route('admin.manage-questions.store')}}" class="needs-validation" enctype="multipart/form-data" novalidate >
                        @csrf
                        <div class="form-row">
                            <div class="col-lg-12 mb-3">
                                <label for="validationCustom01">Question Body</label>
                                <textarea name="question_body" type="text" class="form-control" id="validationCustom01"
                                    placeholder="Question" required></textarea>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                            <div class="col-lg-12 mb-3">
                                <label for="validationCustom01">Exam</label>
                                <select name="exam_id" id="" required placeholder="Role" class="form-control form-select" >
                                    @foreach ($exams as $exam)
                                    <option value="{{$exam->exam_id}}">{{$exam->exam_name}}</option>
                                    @endforeach
                                </select>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-primary" type="submit">Add Question</button>
                    </form>
                    <script>
                        // Example starter JavaScript for disabling form submissions if there are invalid fields
                        (function() {
                            'use strict';
                            window.addEventListener('load', function() {
                                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                                var forms = document.getElementsByClassName('needs-validation');
                                // Loop over them and prevent submission
                                var validation = Array.prototype.filter.call(forms, function(form) {
                                    form.addEventListener('submit', function(event) {
                                        if (form.checkValidity() === false) {
                                            event.preventDefault();
                                            event.stopPropagation();
                                        }
                                        form.classList.add('was-validated');
                                    }, false);
                                });
                            }, false);
                        })();
                    </script>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="main-card mb-3 card">
                <div class="card-body">
                    <h5 class="card-title">Table striped</h5>
                    <table class="mb-0 table table-striped">
                        <thead>
                            <tr class="text-center">
                                <th>#</th>
                                <th>Exam</th>
                                <th>Question Body</th>
                                <th>Edit/Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $counter=0 ?>
                            @foreach ($questions as $question)
                            <?php $counter++ ?>
                            <tr class="text-center">
                                <th>{{$counter}}</th>
                                <th>{{$question->exam_name}}</th>
                                <td style="width:40%">{{$question->question_body}}</td>
                                <td>
                                    <a  href="{{route('admin.manage-questions.edit',$question->question_id)}}"><button type="submit" class="d-inline btn btn-primary">Edit</button></a>
                                    <form class="d-inline" action="{{route('admin.manage-questions.destroy',$question->question_id)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="d-inline btn btn-danger">Delete</button>
                                     </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
