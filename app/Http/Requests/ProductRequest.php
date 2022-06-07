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
     * @return array
     */
    public function rules()
    {
        return [
            'product_name'=>'required|min:6',
            'product_price'=>'required|integer'
        ];
    }

    public function messages()
    {
        return [
            'required'=>':attribute không dược để trống',
            'min'=>':attribute không được nhỏ hơn :min ký tự',
            'integer'=>':attribute phải là số'        
        ];
    }

    public function attributes(){
        return [
            'product_name' =>'Tên sản phẩm',
            'product_price' =>'Giá sản phẩm'
        ];
    }
    public function withValidator($validator){
        $validator->after(function ($validator) {
            if ($this->somethingElseIsInvalid()) {
                $validator->errors()->add(
                    'msg', 'Đã có lỗi xảy ra vui lòng kiểm tra lại'
                );
            }
        });
    }

}
