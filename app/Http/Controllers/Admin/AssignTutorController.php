<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\SendMailToParent;
use Illuminate\Http\Request;
use App\Models\RegisterTeacher;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\Mail\SendInformationAssignTutor;
use DB;

class AssignTutorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $registerTeachers = RegisterTeacher::all();

        return view('admin.assign-tutor.list', compact('registerTeachers'));
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
        $registerTeacher = RegisterTeacher::find($id);

        return view('admin.assign-tutor.show', compact('registerTeacher'));
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

    public function showAssignTutor(Request $request,$id,$email)
    {
        $users = User::where('role', 0)->get();
        return view('admin.assign-tutor.assign', compact('id','users','email'));
        // // RegisterTeacher::where('id', $id)->update(['teacher_id' => $id]);
        // $registerTeacher = RegisterTeacher::find($id);
        // $randomString = Str::random(10);
        // $code = (int)$randomString+time();
        // $sql =  DB::insert('insert into detail_evalue (gmail_user,id_user,code) values (?, ?,?)', [$email,$id, $code]);
        // $user = User::find($request->teacher);
        // Mail::to($email)->send(new SendMailToParent($code,$registerTeacher->name));
        // Mail::to($user->email)->send(new SendInformationAssignTutor($registerTeacher));
        // toastr()->success('Cập nhật thành công');
        // return redirect()->route('assign-tutor.list', ['id' => $id]);
    }

    public function assignTutor(Request $request)
    {   
        RegisterTeacher::where('id', $request->id)->update(['teacher_id' => $request->teacher]);
        $registerTeacher = RegisterTeacher::find($request->teacher);
        $randomString = Str::random(10);
        $code = (int)$randomString+time();
        $sql =  DB::insert('insert into detail_evalue (gmail_user,id_user,code) values (?, ?,?)', [$request->email,$request->teacher, $code]);
        $user = User::find($request->teacher);
        Mail::to($request->email)->send(new SendMailToParent($code,$registerTeacher->name));
        Mail::to($user->email)->send(new SendInformationAssignTutor($registerTeacher));
        toastr()->success('Cập nhật thành công');
        return redirect()->route('assign-tutor.list', ['id' => $request->teacher]);
}
}
