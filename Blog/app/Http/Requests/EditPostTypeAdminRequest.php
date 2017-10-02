<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditPostTypeAdminRequest extends FormRequest
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
            'post_type_name' => 'required',
            'status_show'    => 'required',
        ];
    }
    public function messages()
    {
        return [
            'post_type_name.required' => 'Nhập tên Post Type Name',
            'status_show.required'  => 'Chọn kiểu hiển thị',
        ];
    }
}
