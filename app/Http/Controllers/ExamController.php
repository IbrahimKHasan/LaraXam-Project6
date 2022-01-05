<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use App\Http\Requests\StoreExamRequest;
use App\Http\Requests\UpdateExamRequest;
use Illuminate\Http\Request;

class ExamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $exams=Exam::all();
        return view('admin.exams',compact('exams'));
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
     * @param  \App\Http\Requests\StoreExamRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $data)
    {
        $image = 'IMG'.'-'.time().'.'.$data->image->extension();
        $data->image->move(public_path('img'),$image);
        Exam::create([
            'exam_name' => $data['exam_name'],
            'exam_description' => $data['exam_description'],
            'exam_image'=>$image
        ]);
        return redirect()->route('admin.manage-exams.index')->with('success','Exam Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Exam  $exam
     * @return \Illuminate\Http\Response
     */
    public function show(Exam $exam)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Exam  $exam
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $exam=Exam::where('exam_id',$id)->first();
        return view('admin.examsEdit',compact('exam'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateExamRequest  $request
     * @param  \App\Models\Exam  $exam
     * @return \Illuminate\Http\Response
     */
    public function update(Request $data, $id)
    {
        $image = 'IMG'.'-'.time().'.'.$data->image->extension();
        $data->image->move(public_path('img'),$image);
        Exam::where('exam_id',$id)->update([
            'exam_name' => $data['exam_name'],
            'exam_description' => $data['exam_description'],
            'exam_image'=>$image
        ]);
        return redirect()->route('admin.manage-exams.index')->with('success','Exam Edited Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Exam  $exam
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Exam::where('exam_id',$id)->delete();
        return redirect()->route('admin.manage-exams.index')->with('success','Exam Deleted Successfully');
    }
}
