
@extends('layouts.public.master')
@section('body',"background-color: #0470f3")
@section('title',"LaraXam - Exam")
@section('time')
    <script>
        if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
}
        window.history.forward();
        function noBack() {
            window.history.forward();
        }
    </script>
@endsection
@section('content')
<section id="services" class="features-area">
<div class="container" >
    <h1>{{$exam->exam_name ." ".'Exam'}}</h1>
    @if ($result>=50)
       <script>
           var result = "<?php echo $result; ?>"
       swal("Congrats You Pass", "Your Result is: "+result+"%" , "success");
    </script>
    <h3 style="color:#00e900">Your Result is: {{$result}}%</h3>
    @else
    <script>
        var result = "<?php echo $result; ?>"
        swal("Unfortunately You Fail", "Your Result is: "+result+"%" , "error");
 </script>
 <h3 style="color:red">Your Result is: {{$result}}%</h3>
    @endif
    <br>
    <div style="font-size:large;background-color:white;padding:10px;border-radius:10px;box-shadow: 0px 0px 19px -4px #000000;"
    >
    <form method="POST" action="{{route('laraxam.store')}}">
        @csrf
        <?php $counter = 0 ?>
        @foreach ($questions as $question)
        <?php $counter++ ?>
            <h6>{{"Q$counter. ".$question->question_body}}</h6>
        <?php $answers = ('App\Models\Question')::where('question_id',$question->question_id)->first()->answers ?>
        @foreach ($answers as $answer)
        <p>{{ $request['what is math'] }}</p>
        <div class="form-check">
            <input @if ($request[$question->question_id]==$answer->answer_id) checked style="color:red" @endif
            class="form-check-input" type="radio" name="{{$answer->question_id}}" id="{{$answer->answer_id}}" value="{{$answer->answer_status}}">
            <label @if ($answer->answer_status=='false') style="color:red" @else style="color:#00e900;font-weight:bolder" @endif  class="form-check-label" for="{{$answer->answer_id}}">
              {{$answer->answer_body}}
            </label>
          </div>
          @endforeach
          <br>
          @endforeach
        </form>
        <button type="button" class="btn btn-primary"><a style="color:white"href="/laraxam">Back to Home</a></button>
    </div>




</div>
</section>
@endsection

