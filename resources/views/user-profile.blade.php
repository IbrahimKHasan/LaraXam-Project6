@extends('layouts.public.master')
@section('body',"background-color: #0470f3")
@section('title',"LaraXam - User Profile")
@section('content')
<section id="services" class="features-area">
    <div class="container" >
        <div class="row gutters">
            <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
              <div class="card h-100">
                <div class="card-body">
                  <div class="account-settings">
                    <div class="user-profile">
                      <div class="user-avatar">
                        <img src="{{asset('img/'.Auth::user()->image)}}" alt="Maxwell Admin">
                      </div>
                      <h5 class="user-name text-center">{{Auth::user()->name}}</h5>
                      <h6 class="user-email text-center">{{Auth::user()->email}}</h6>
                      <br>
                      <p style="font-size: smaller;font-weight:bolder;" class="text-center">Number of Exams Taken: <span style="color:rgb(50, 214, 50)">{{$noexams}}</span></p>
                      <p style="font-size: smaller;font-weight:bolder;" class="text-center">Exams Reulst Average: <span style="color:rgb(50, 214, 50)">{{ceil($avg)}}%</span></p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
              <div class="card h-100">
                @include('alerts.success')
                <div class="card-body">
                  <div class="row gutters">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                      <h6 class="mb-2 text-primary">Personal Details</h6>
                    </div>
                    <form enctype="multipart/form-data" action="{{route('profile.update',Auth::user()->id)}}" method="POST" class="col-xl-12 col-lg-12 col-md-6 col-sm-6 col-12">
                    @csrf
                    @method('PUT')
                        <div class="col-xl-12 col-lg-12 col-md-6 col-sm-6 col-12">
                            <label for="fullName">Name</label>
                            <input type="text" name="name" class="form-control" id="fullName" value="{{Auth::user()->name}}" placeholder="Enter full name">
                        </div>
                        <br>
                    <div class="col-xl-12 col-lg-12 col-md-8 col-sm-6 col-12">
                        <label for="eMail">Email</label>
                        <input type="email" name="email" class="form-control" id="eMail" value="{{Auth::user()->email}}" placeholder="Enter email ID">
                    </div>
                    <br>
                    <div class="col-xl-12 col-lg-12 col-md-6 col-sm-6 col-12">
                        <label for="website">Password</label>
                        <input type="password" name="password" class="form-control" id="website" value="" placeholder="password">
                    </div>
                    <div class="col-xl-12 col-lg-12 col-md-6 col-sm-6 col-12">
                        <label for="image">Profile Picture</label>
                        <input type="file" name="image" class="form-control" id="image" value="" placeholder="password">
                    </div>
                  </div>
                  <br>
                        <div class="text-left">
                          <button type="submit" id="submit" name="edit_btn" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
            <br>
            <h1 class="text-center">My Exams</h1>
            <br>
      <table class="table">
        <thead>
          <tr class="text-center">
            <th scope="col">#</th>
            <th scope="col">Exam</th>
            <th scope="col">Result/100</th>
            <th scope="col">Status</th>
            <th scope="col">Date</th>
          </tr>
        </thead>
        <tbody>
            <?php $counter=0 ?>
            @foreach ($user as $item)
            <?php $counter++ ?>
          <tr class="text-center">
            <th scope="row">{{$counter}}</th>
            <td>{{$item->exam_name}}</td>
            <td>{{$item->exam_result}}</td>
            @if ($item->exam_result>=50)<td style="background-color: rgb(50, 214, 50)">Pass</td> @endif
            @if ($item->exam_result<50)<td style="background-color: red">Fail</td> @endif
            <td>{{$item->created_at}}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
        </div>
    </div>
</section>
@endsection
