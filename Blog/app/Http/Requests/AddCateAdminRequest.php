<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddCateAdminRequest extends FormRequest
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
            'parent_id' => 'required',
            'menu_id'   => 'required',
            'category_name' => 'required|unique:categorys,category_name'
        ];
    }
    public function messages()
    {
        return [
            'parent_id.required' => 'Chọn tên parent id',
            'menu_id.required'   => 'Chọn menu hiển thị',
            'category_name.required'  => 'Nhập tên category',
            'category_name.unique'  => 'Tên category đã bị trùng',
        ];
    }
}
