<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Exam;
use App\Models\Question;
use App\Models\Answer;
use App\Models\User;
use Illuminate\Support\Facades\DB;


class LandingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $exams=Exam::all();
        return view('index',compact('exams'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id = $request->id;
        $questions = Exam::where('exam_id',$id)->first()->questions;
        $nquestions = Exam::where('exam_id',$id)->first()->questions->count();
        $exam = Exam::where('exam_id',$id)->first();
        $counter=0;
        foreach ($request->except('_token') as $key => $value) {
            $correct = Answer::where('question_id',$key)->where('answer_status','true')->value('answer_id');
            if ($correct==$value){
                $counter++;
              }
        }
        // User::find(Auth::user()->id)->exams()->attach($exam->value('exam_id'))->save();
        DB::table('exam_user')->insert([
            'user_id'=>Auth::user()->id,
            'exam_id'=>$id,
            'exam_result'=>($counter/$nquestions)*100,
            'created_at'=>date('Y-m-d'),
        ]);
        $result = ($counter/$nquestions)*100;
        return view('result',compact('result','questions','exam','request'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $questions = Exam::where('exam_id',$id)->first()->questions;
        $exam = Exam::where('exam_id',$id)->first();
        // foreach ($questions as $question) {
        //     array_push($questionsBody,$question->question_body);
        //     $answers = Question::where('question_id',$question->question_id)->first()->answers;
        //     foreach ($answers as $answer) {
        //         array_push($exam,[$answer->answer_body]);
        //     }
        // }
        return view('exam',compact('exam','questions'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
