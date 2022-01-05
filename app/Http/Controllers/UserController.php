<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users=User::all();
        return view('admin.users',compact('users'));
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
    public function store(Request $data)
    {
        $image = 'IMG'.'-'.time().'.'.$data->image->extension();
        $data->image->move(public_path('img'),$image);
        User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'role'=>$data['role'],
            'password' => Hash::make($data['password']),
            'image'=>$image
        ]);
        return redirect()->route('admin.manage-users.index')->with('success','User Added Successfully');
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
        $user=User::find($id);
        return view('admin.usersEdit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $data, $id)
    {
        $image = 'IMG'.'-'.time().'.'.$data->image->extension();
        $data->image->move(public_path('img'),$image);
        User::where('id',$id)->update([
            'name' => $data['name'],
            'email' => $data['email'],
            'role'=>$data['role'],
            'password' => Hash::make($data['password']),
            'image'=>$image
        ]);
        return redirect()->route('admin.manage-users.index')->with('success','User Edited Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy($id);
        return redirect()->route('admin.manage-users.index')->with('success','User Deleted Successfully');
    }
}
