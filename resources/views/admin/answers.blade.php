@extends('layouts.admin.master')
@section('title', 'Manage Answers')
@section('answer-active', 'class=mm-active')
@section('content')
<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="col-lg-12">
            <div class="main-card mb-3 card">
                <div class="card-body">
                    <h5 class="card-title">Add Answers</h5>
                    @include('alerts.success')
                    <form method="POST" action="{{route('admin.manage-answers.store')}}" class="needs-validation" enctype="multipart/form-data" novalidate >
                        @csrf
                        <div class="form-row">
                            <div class="col-lg-12 mb-3">
                                <label for="validationCustom01">Answer Body</label>
                                <textarea name="answer_body" type="text" class="form-control" id="validationCustom01"
                                    placeholder="Answer" required></textarea>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                            <div class="col-lg-12 mb-3">
                                <label for="validationCustom01">Question</label>
                                <select name="question_id" id="" required placeholder="Role" class="form-control form-select" >
                                    @foreach ($questions as $question)
                                    <option value="{{$question->question_id}}">{{$question->question_body}}</option>
                                    @endforeach
                                </select>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                            <div class="col-lg-12 mb-3">
                                <label for="validationCustom01">Answer Status</label>
                                <select name="answer_status" id="" required placeholder="Role" class="form-control form-select" >
                                    <option value="true">True</option>
                                    <option value="false">False</option>
                                </select>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-primary" type="submit">Add Answer</button>
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
                                <th>Question</th>
                                <th>Answer Body</th>
                                <th>Answer Status</th>
                                <th>Edit/Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $counter=0 ?>
                            @foreach ($answers as $answer)
                            <?php $counter++ ?>
                            <tr class="text-center">
                                <th>{{$counter}}</th>
                                <th>{{$answer->exam_name}}</th>
                                <td>{{$answer->question_body}}</td>
                                <td>{{$answer->answer_body}}</td>
                                <td>{{$answer->answer_status}}</td>
                                <td>
                                    <a  href="{{route('admin.manage-answers.edit',$answer->answer_id)}}"><button type="submit" class="d-inline btn btn-primary">Edit</button></a>
                                    <form class="d-inline" action="{{route('admin.manage-answers.destroy',$question->question_id)}}" method="POST">
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
