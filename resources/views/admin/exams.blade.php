@extends('layouts.admin.master')
@section('title', 'Manage Exams')
@section('exam-active', 'class=mm-active')
@section('content')
<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="col-lg-12">
            <div class="main-card mb-3 card">
                <div class="card-body">
                    <h5 class="card-title">Add Exam</h5>
                    @include('alerts.success')
                    <form method="POST" action="{{route('admin.manage-exams.store')}}" class="needs-validation" enctype="multipart/form-data" novalidate >
                        @csrf
                        <div class="form-row">
                            <div class="col-lg-12 mb-3">
                                <label for="validationCustom01">Exam name</label>
                                <input name="exam_name" type="text" class="form-control" id="validationCustom01"
                                    placeholder="Exam name" required>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                            <div class="col-lg-12 mb-3">
                                <label for="validationCustom01">Exam Description</label>
                                <textarea name="exam_description" type="text" class="form-control" id="validationCustom01"
                                    placeholder="Exam Description" required></textarea>
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
                        <button class="btn btn-primary" type="submit">Add Exam</button>
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
                                <th>Exam Name</th>
                                <th>Exam Description</th>
                                <th>Exam Image</th>
                                <th>Edit/Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($exams as $exam)
                            <tr class="text-center">
                                <th>{{$exam->exam_id}}</th>
                                <td>{{$exam->exam_name}}</td>
                                <td style="width:500px">{{$exam->exam_description}}</td>
                                <td><img src="{{asset('img/'.$exam->exam_image)}}" alt="" width="100px" height="100px"></td>
                                <td>
                                    <a  href="{{route('admin.manage-exams.edit',$exam->exam_id)}}"><button type="submit" class="d-inline btn btn-primary">Edit</button></a>
                                    <form class="d-inline" action="{{route('admin.manage-exams.destroy',$exam->exam_id)}}" method="POST">
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
