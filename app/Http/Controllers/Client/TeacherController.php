<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Vanthao03596\HCVN\Models\Province;
use App\Models\Classes;
use App\Models\Subject;
use App\Models\User;
use App\Http\Requests\RequestRegisTeacher;

class TeacherController extends Controller
{
    public function registerTeacher() {
        $cities = Province::orderBy('name','asc')->get();
        $classes = Classes::all();
        
        return view('client.register-teacher', compact('cities', 'classes'));
    }

    public function handleRegisterTeacher(Request $request) {
        if ($request->hasFile('avatar') && $request->hasFile('certificate_img')) {
            $classes = implode(',', $request->classes);
            $subjects = implode(',', $request->subjects);
            $districts = implode(',', $request->districts);
            $times = implode(', ', $request->times);
            $request->avatar->storeAs('/public/images/avatars', $request->avatar->getClientOriginalName());
            $request->certificate_img->storeAs('/public/images/certificate_imgs', $request->certificate_img->getClientOriginalName());
            User::create([
                'name' => $request->name,
                'gender' => $request->gender,
                'voice' => $request->voice,
                'birthday' => $request->birthday,
                'identity_number' => $request->identity_number,
                'address' => $request->address,
                'email' => $request->email,
                'phone' => $request->phone,
                'avatar' => '/storage/images/avatars/' . $request->avatar->getClientOriginalName(),
                'certificate_img' => '/storage/images/certificate_imgs/' . $request->certificate_img->getClientOriginalName(),
                'classes' => $classes,
                'subjects' => $subjects,
                'province_id' => $request->city,
                'districts' => $districts,
                'times' => $times,
                'number_sessions' => $request->number_sessions,
                'salary' => $request->salary,
                'password' => bcrypt($request->password),
                'status' => 0
            ]);
            toastr()->success('Đăng ký thành công, vui lòng đợi trung tâm duyệt, sau 2 - 3 ngày trung tâm sẽ liên hệ lại khi có kết quả duyệt');

            return redirect()->back();
        }
    }

    public function ajaxClass(Request $request) {
        $classId = $request->classId;
        if (is_array($classId)) {
            $subjects = Subject::join('classes', 'subjects.class_id', '=', 'classes.id')
            ->whereIn('class_id', $classId)
            ->select(['subjects.*', 'classes.title as class_title'])
            ->get();
        } else {
            $subjects = Subject::join('classes', 'subjects.class_id', '=', 'classes.id')
            ->where('class_id', $classId)
            ->select(['subjects.*', 'classes.title as class_title'])
            ->get();
        }

        return response()->json([
            'status' => 200,
            'subjects' => $subjects
        ]);
    }

    public function ajaxCity(Request $request) {
        $city = Province::find($request->cityId);
        $districts = $city->districts;

        return response()->json([
            'status' => 200,
            'districts' => $districts
        ]);
    }
    public function editInfor(){
        if(!auth()->user()){
            return redirect()->route('client.home');
        }
        return 'ok';
    }
    public function updateInfor (){

    }
}
