@extends('layouts.admin.master')
@section('title', 'Manage Questions')
@section('question-active', 'class=mm-active')
@section('content')
<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="col-lg-12">
            <div class="main-card mb-3 card">
                <div class="card-body">
                    <h5 class="card-title">Edit Questions</h5>
                    @include('alerts.success')
                    <form method="POST" action="{{route('admin.manage-questions.update',$question->question_id)}}" class="needs-validation" enctype="multipart/form-data" novalidate >
                        @csrf
                        @method('PUT')
                        <div class="form-row">
                            <div class="col-lg-12 mb-3">
                                <label for="validationCustom01">Question Body</label>
                                <textarea name="question_body" type="text" class="form-control" id="validationCustom01"
                                 placeholder="Question" required>{{$question->question_body}}</textarea>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                            <div class="col-lg-12 mb-3">
                                <label for="validationCustom01">Exam</label>
                                <select name="exam_id" id="" required placeholder="Role" class="form-control form-select" >
                                    @foreach ($exams as $exam)
                                    <option @if ($question->exam_id == $exam->exam_id) selected @endif value="{{$exam->exam_id}}">{{$exam->exam_name}}</option>
                                    @endforeach
                                </select>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-primary" type="submit">Edit Question</button>
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
    </div>
</div>
@endsection
