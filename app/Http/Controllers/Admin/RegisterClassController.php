<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RegisterClass;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use App\Mail\SendApproveRegisterClass;

class RegisterClassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $registerClasses = RegisterClass::all();

        return view('admin.register-classes.list', compact('registerClasses'));
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

    public function approve($id)
    {
        $registerClass = RegisterClass::find($id);
        $registerClass->status = 1;
        $registerClass->save();
        $remainingTeachers = RegisterClass::where([['post_id', $registerClass->post_id], ['teacher_id', '<>', $registerClass->teacher_id]])->pluck('teacher_id');
        RegisterClass::whereIn('teacher_id', $remainingTeachers)->update(['status' => 2]);
        toastr()->success('Duyệt thành công');
        $user = User::find($registerClass->teacher_id);
        Mail::to($user->email)->send(new SendApproveRegisterClass($user, $registerClass));

        return redirect()->back();
    }
}
