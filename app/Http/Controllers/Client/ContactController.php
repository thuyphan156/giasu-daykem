<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Vanthao03596\HCVN\Models\Province;
use App\Models\Classes;
use App\Models\Contact;

class ContactController extends Controller
{
    public function contact() {
        $cities = Province::get();
        $classes = Classes::all();

        return view('client.contact', compact('cities', 'classes'));
    }

    public function postContact(Request $request) {
        Contact::create([
            'name' => $request->name,
            'email' => $request->email,
            'province_id' => $request->city,
            'district_id' => $request->district,
            'address' => $request->address,
            'phone' => $request->phone,
            'class_id' => $request->class,
            'subject_id' => $request->subject,
            'students' => $request->students,
            'time' => implode(', ', $request->times),
            'salary' => $request->salary,
            'note' => $request->note
        ]);
        toastr()->success('Gửi thành công, trung tâm sẽ liên hệ cho phụ huynh trong vòng 2 - 3 ngày');

        return redirect()->back();
    }
}
