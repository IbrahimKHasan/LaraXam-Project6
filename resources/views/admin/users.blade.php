@extends('layouts.admin.master')
@section('title', 'Manage Users')
@section('user-active', 'class=mm-active')
@section('content')
    <div class="app-main__outer">
        <div class="app-main__inner">
            <div class="col-lg-12">
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <h5 class="card-title">Add User</h5>
                        @include('alerts.success')
                        <form method="POST" action="{{route('admin.manage-users.store')}}" class="needs-validation" enctype="multipart/form-data" novalidate >
                            @csrf
                            <div class="form-row">
                                <div class="col-lg-6 mb-3">
                                    <label for="validationCustom01">Full name</label>
                                    <input name="name" type="text" class="form-control" id="validationCustom01"
                                        placeholder="Full name" required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="validationCustom02">Role</label>
                                    <select name="role" id="" required placeholder="Role" class="form-control form-select" >
                                        <option value="user">User</option>
                                        <option value="admin">Admin</option>
                                    </select>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="validationCustom02">Email</label>
                                    <input name="email" type="email" class="form-control" id="validationCustom02"
                                        placeholder="Email Address"  required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="validationCustom02">Password</label>
                                    <input name="password" type="password" class="form-control" id="validationCustom02"
                                        placeholder="Password"  required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="validationCustom02">Image</label>
                                    <input name="image" type="file" class="form-control" id="validationCustom02" required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-primary" type="submit">Add User</button>
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
                                    <th>Full Name</th>
                                    <th>Role</th>
                                    <th>Email</th>
                                    <th>Image</th>
                                    <th>Edit/Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                <tr class="text-center">
                                    <th>{{$user->id}}</th>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->role}}</td>
                                    <td>{{$user->email}}</td>
                                    <td><img src="{{asset('img/'.$user->image)}}" alt="" width="100px" height="100px"></td>
                                    <td>
                                        <a  href="{{route('admin.manage-users.edit',$user->id)}}"><button type="submit" class="d-inline btn btn-primary">Edit</button></a>
                                        <form class="d-inline" action="{{route('admin.manage-users.destroy',$user->id)}}" method="POST">
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
