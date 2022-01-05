<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Http\Requests\StoreAnswerRequest;
use App\Http\Requests\UpdateAnswerRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Question;
use App\Models\Exam;

class AnswerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $answers = DB::table('answers')
        ->select('*')
        ->join('questions', 'answers.question_id', '=', 'questions.question_id')
        ->join('exams', 'exams.exam_id', '=', 'questions.exam_id')->get();
         $questions=Question::all();
        // $questions=Question::all()->first->exam;
        return view('admin.answers',compact('answers','questions'));
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
     * @param  \App\Http\Requests\StoreAnswerRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Answer::create($request->all());
        return redirect()->route('admin.manage-answers.index')->with('success','Answer Added Successfully');;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function show(Answer $answer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $questions=Question::all();
        $answer=Answer::where('answer_id',$id)->first();
        return view('admin.answersEdit',compact('questions','answer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAnswerRequest  $request
     * @param  \App\Models\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Answer::where('answer_id',$id)->update([
            'answer_body'=>$request->answer_body,
            'answer_status'=>$request->answer_status,
            'question_id'=>$request->question_id,
        ]);
        return redirect()->route('admin.manage-answers.index')->with('success','Question Edited Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Answer::where('answer_id',$id)->delete();
        return redirect()->route('admin.manage-answers.index')->with('success','Answer Deleted Successfully');
    }
}
