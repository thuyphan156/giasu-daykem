<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $staffs = Admin::where('role', 1)->get();

        return view('admin.staffs.list', compact('staffs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.staffs.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $check = Admin::where('email', $request->email)->exists();
        if ($check) {
            return redirect()->back();
        }
        Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt('123456'),
            'role' => 1
        ]);
        toastr()->success('Thêm thành công');
        
        return redirect()->route('staff.list');
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
        $staff = Admin::find($id);

        return view('admin.staffs.edit', compact('staff'));
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
        $staff = Admin::find($id);
        if ($staff->email != $request->email) {
            $check = Admin::where('email', $request->email)->exists();
            if ($check) {
                return redirect()->back();
            }
        }
        $staff->name = $request->name;
        $staff->email = $request->email;
        $staff->password = $request->password == $staff->password ? $staff->password : bcrypt($request->password);
        $staff->save();
        toastr()->success('Cập nhật thành công');

        return redirect()->route('staff.list');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $staff = Admin::find($id);
        $staff->delete();
        toastr()->success('Xóa thành công');

        return redirect()->route('staff.list');
    }
}
