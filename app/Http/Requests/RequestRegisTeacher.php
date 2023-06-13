<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestRegisTeacher extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|max:255|min:6',
            'gender' => 'required',
            'voice' => 'required',
            'birthday' => 'required',
            'email' => 'required|unique:register_teachers,email',
            'password' => 'required|confirmed|max:255|min:6',
            're_password' => 'required_with:password|same:password|max:255|min:6',
            'phone' => 'required|max:255|min:6',
            'identity_number' => 'required|max:255|min:6',
            'address' => 'required|max:255|min:6',
            'avatar' => 'required|max:255|min:6',
            'certificate_img' => 'required|max:255|min:6'          
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Phần có dấu * là bắt buộc nhập',
            'name.min' => 'Tên tối thiểu có 6 kí tự, tối đa 255 kí tự',
            'name.max' => 'Tên tối thiểu có 6 kí tự, tối đa 255 kí tự',
            'gender.required' => 'Phần có dấu * là bắt buộc nhập',
            'voice.required' => 'Phần có dấu * là bắt buộc nhập',
            'birthday.required' => 'Phần có dấu * là bắt buộc nhập',
            'email.required' => 'Phần có dấu * là bắt buộc nhập',
            'password.required' => 'Phần có dấu * là bắt buộc nhập',
            'phone.require' => 'Phần có dấu * là bắt buộc nhập',
            'identity_number.required' => 'Phần có dấu * là bắt buộc nhập',
            'address.required' => 'Phần có dấu * là bắt buộc nhập',
            'avatar.required' => 'Phần có dấu * là bắt buộc nhập',
            'certificate_img.required' => 'Phần có dấu * là bắt buộc nhập'
        ];
    }
}
