<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Auth;
use App\User;

class UserController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $currentuserid = Auth::user()->id;
        $users = User::all()->where('id', $currentuserid);
        //print_r($users); die;
        return view('admin.user.user', ['data'=>$users]);
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
    public function edit()
    {
        $currentuserid = Auth::user()->id;
        $users = User::find($currentuserid);
        return view('admin.user.editUser', ['data'=>$users]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $currentuserid = Auth::user()->id;
        $this->validate($request,[
         'name'=>'required',
         'email'=>'required',
         'address'=>'required',
      ]);
        //print_r($request->all()); die;
        unset($request['_token']);
        User::where('id', $currentuserid)
          ->update($request->all());
        $users = User::find($currentuserid);
        return redirect('/admin/users')->with('data', $users)->with('success', 'Profile Update successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {//die("hiii");
       $user = User::find($id);
       $user->delete();
       $users = User::all();
        return redirect()->back()->with(['data', $users])->with('success', 'Record delete successfully');
    }
}
