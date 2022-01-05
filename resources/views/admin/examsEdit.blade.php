@extends('layouts.admin.master')
@section('title', 'Manage Exams - Edit')
@section('exam-active', 'class=mm-active')
@section('content')
<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="col-lg-12">
            <div class="main-card mb-3 card">
                <div class="card-body">
                    <h5 class="card-title">Edit Exam</h5>
                    @include('alerts.success')
                    <form method="POST" action="{{route('admin.manage-exams.update',$exam->exam_id)}}" class="needs-validation" enctype="multipart/form-data" novalidate >
                        @csrf
                        @method('PUT')
                        <div class="form-row">
                            <div class="col-lg-12 mb-3">
                                <label for="validationCustom01">Exam name</label>
                                <input name="exam_name" type="text" class="form-control" id="validationCustom01"
                                    placeholder="Exam name" value="{{$exam->exam_name}}" required>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                            <div class="col-lg-12 mb-3">
                                <label for="validationCustom01">Exam Description</label>
                                <textarea name="exam_description" type="text" class="form-control" id="validationCustom01"
                                    placeholder="Exam Description" required>{{$exam->exam_description}}</textarea>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="validationCustom02">Exam Image</label>
                                <input name="image" type="file" class="form-control" id="validationCustom02" required>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-primary" type="submit">Edit Exam</button>
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
