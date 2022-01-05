<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Exam;
use App\Http\Requests\StoreQuestionRequest;
use App\Http\Requests\UpdateQuestionRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions = DB::table('questions')
        ->select('*')
        ->join('exams', 'questions.exam_id', '=', 'exams.exam_id')->get();
         $exams=Exam::all();
        // $questions=Question::all()->first->exam;
        return view('admin.questions',compact('exams','questions'));
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
     * @param  \App\Http\Requests\StoreQuestionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Question::create($request->all());
        $success="Question Added Successfully";
        return redirect()->route('admin.manage-questions.index',compact('success'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $exams=Exam::all();
        $question=Question::where('question_id',$id)->first();
        return view('admin.questionsEdit',compact('question','exams'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateQuestionRequest  $request
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Question::where('question_id',$id)->update([
            'question_body'=>$request->question_body,
            'exam_id'=>$request->exam_id
        ]);
        return redirect()->route('admin.manage-questions.index')->with('success','Question Edited Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Question::where('question_id',$id)->delete();
        return redirect()->route('admin.manage-questions.index')->with('success','Question Deleted Successfully');
    }
}
