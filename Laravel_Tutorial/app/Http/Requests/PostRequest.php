<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' =>'required',
            'author' =>'required',
            'content' => 'required',
            'group_id' => ['required','integer', function($attribute,$value, $fail){
                if($value == 0){
                    $fail('Bắt buộc phải chọn nhóm');
                }
            }],
        ];
    }

    public function messages()
    {
        return  [
            'title.required' => 'Tiêu đề bắt buộc phải nhập',

            'author.required' => 'Tác giả bắt buộc phải nhập',
            'content.required' => 'Nội dung bắt buộc phải nhập',
            'group_id.required' => 'Thể loại không được để trống',
            'group_id.integer' => 'Nhóm không hợp lệ',
            ];
    }
}
