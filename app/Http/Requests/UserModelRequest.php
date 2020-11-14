<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserModelRequest extends FormRequest
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
            'user_name' => 'required|string|max:255',
            'user_email'=>'required|string|email|max:255',
            'user_password' => 'required|string|min:8|confirmed',
            'user_profile_photo' => 'max:1024'
        ];
    }

    public function messages(){
        return [
            'user_profile_photo.max' => '※画像は1MBまでです',
            'required' => '※必須項目です',
            'max' => '※225文字以内で入力して下さい',
            'min' => '※パスワードは8字以上で入力して下さい',
            'confirmed' => '※パスワードが一致しません'
        ];
    }
}
