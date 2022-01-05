<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
class UserProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $noexams=DB::table('exam_user')->where('user_id',Auth::user()->id)->count();
        $avg = DB::table('exam_user')->where('user_id',Auth::user()->id)->avg('exam_result');
        $user=DB::table('exam_user')->where('user_id',Auth::user()->id)
        ->select('exams.exam_name','exam_user.exam_id','exam_user.created_at','exam_user.id','exam_user.exam_result')
        ->join('exams','exams.exam_id','=','exam_user.exam_id')
        ->get();
        return view('user-profile',compact('user','noexams','avg'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        $image = 'IMG'.'-'.time().'.'.$request->image->extension();
        $request->image->move(public_path('img'),$image);
        User::where('id',$id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'password'=>Hash::make($request->password),
            'image'=>$image
        ]);
        return redirect()->route('profile.index')->with('success','User Edited Successfully');
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
