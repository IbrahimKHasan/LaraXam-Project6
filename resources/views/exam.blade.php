@extends('layouts.public.master')
@section('body',"background-color: #0470f3")
@section('title',"LaraXam - Exam")
@section('content')
@section('time')
<script>
function Timer() {
    counter=2
  var myTimer = setInterval(function() {
    document.getElementById("testTimer").innerHTML = counter;
    counter--;
    if (counter < 0) {
      clearInterval(myTimer);
      document.getElementById("testTimer").style.color = "red";

      // do anything then time is up. ex: submit() function
      document.getElementById("submit").submit();
    }
  },60000);
}
Timer();
</script>
@endsection
<section id="services" class="features-area">
    <div class="text-right" style="font-weight:bolder;font-size: larger;position:fixed;right:80px;top:100px;
    background-color:rgb(204, 203, 203);padding:10px;border-radius:10px;color: red"
    >
    <span>Time left :&nbsp;</span><div style="display:inline-block;"  id="testTimer">3</div>&nbsp;<span style="color: red;">Minutes</span>
    </div>
<div class="container" >
    <h1>{{$exam->exam_name ." ".'Exam'}}</h1>
    <br>
    <div style="width:90%;font-size:large;background-color:white;padding:10px;border-radius:10px;box-shadow: 0px 0px 19px -4px #000000;"
    >
    <form method="POST" action="{{route('laraxam.store')}}" id="submit">
        @csrf
        <input type="hidden" name="id" value="{{$exam->exam_id}}">
        <?php $counter = 0 ?>
    @foreach ($questions as $question)
    <?php $counter++ ?>
        <h5>{{"Q$counter. ".$question->question_body}}</h5>
        <?php $answers = ('App\Models\Question')::where('question_id',$question->question_id)->first()->answers ?>
        @foreach ($answers as $answer)
        <div class="form-check">
            <input  class="form-check-input" type="radio" name="{{$question->question_id}}" id="{{$answer->answer_id}}"
            value="{{$answer->answer_id}}">
            <label style="font-size: small" class="form-check-label" for="{{$answer->answer_id}}">
              {{$answer->answer_body}}
            </label>
          </div>
          @endforeach
          <br>
          @endforeach
          <button type="submit" class="btn btn-primary">Submit Answers</button>
        </form>
    </div>



</div>
</section>
@endsection
