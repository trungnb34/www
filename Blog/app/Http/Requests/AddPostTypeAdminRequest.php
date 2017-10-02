<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddPostTypeAdminRequest extends FormRequest
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
            'post_type_name' => 'required|unique:post_types,post_type_name',
            'status_show'    => 'required'
        ];
    }
    public function messages()
    {
        return [
            'post_type_name.required' => 'Nhập tên post type',
            'post_type_name.unique'   => 'Tên post type đã bị trùng',
            'status_show.required'  => 'Chọn kiểu hiển thị',
        ];
    }
}
