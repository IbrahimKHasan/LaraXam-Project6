@extends('layouts.admin.master')
@section('title', 'Manage Answers - Edit')
@section('answer-active', 'class=mm-active')
@section('content')
<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="col-lg-12">
            <div class="main-card mb-3 card">
                <div class="card-body">
                    <h5 class="card-title">Edit Answers</h5>
                    @include('alerts.success')
                    <form method="POST" action="{{route('admin.manage-answers.update',$answer->answer_id)}}" class="needs-validation" enctype="multipart/form-data" novalidate >
                        @csrf
                        @method('PUT')
                        <div class="form-row">
                            <div class="col-lg-12 mb-3">
                                <label for="validationCustom01">Answer Body</label>
                                <textarea name="answer_body" type="text" class="form-control" id="validationCustom01"
                                     placeholder="Answer" required>{{$answer->answer_body}}</textarea>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                            <div class="col-lg-12 mb-3">
                                <label for="validationCustom01">Question</label>
                                <select name="question_id" id="" required placeholder="Role" class="form-control form-select" >
                                    @foreach ($questions as $question)
                                    <option @if ($answer->question_id == $question->question_id) selected @endif value="{{$question->question_id}}">{{$question->question_body}}</option>
                                    @endforeach
                                </select>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                            <div class="col-lg-12 mb-3">
                                <label for="validationCustom01">Answer Status</label>
                                <select name="answer_status" id="" required placeholder="Role" class="form-control form-select" >
                                    <option @if ($answer->question_status == 'true') selected @endif value="true">True</option>
                                    <option @if ($answer->question_status == 'false') selected @endif value="false">False</option>
                                </select>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-primary" type="submit">Edit Answer</button>
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
