<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'product_name' =>'required|min:6',
            'product_price' => 'required|integer'
        ];
    }

    public function messages()
    {
//        return [
//            'product_name.required' => 'Tên sản phẩm bắt buộc phải nhập',
//            'product_name.min' => 'Tên sản phẩm không được nhỏ hơn :min kí tụ',
//            'product_price.required' => 'Giá sản phẩm bắt buộc phải nhập',
//            'product_name.integer' => 'Giá sản phẩm phải là số tự nhiên',
//        ];

        return [
            'product_name.required' => 'Trường :attribute bắt buộc phải nhập',
            'product_name.min' => 'Trường :attribute không được nhỏ hơn :min kí tụ',
            'product_price.required' => 'Trường :attribute bắt buộc phải nhập',
            'product_name.integer' => 'Trường :attribute phải là số tự nhiên',
        ];
    }

    public function attributes()
    {
        return [
            'product_name' => 'Tên sản phẩm',
            'product_price' => 'Giá sản phẩm'
        ];
    }
}
