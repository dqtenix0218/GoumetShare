<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreatePostRequest extends FormRequest
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
            'caption' => 'required|max:255',
            'photo' => 'required|max:1024',
            'address' => 'required',
            'place' => 'required',
            'genre' => 'required'
        ];
    }

    public function messages(){
        return [
            'required' => '※必須項目です。',
            'max' => '※入力は255文字までです。',
            'photo.required' => '※画像は必ず選択して下さい。',
            'photo.max' => '※画像のサイズは1MBまでです。'
        ];
    }
}
