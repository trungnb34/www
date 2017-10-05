<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditPostAdminRequest extends FormRequest
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
            "title" => 'required',
            'category_id' => 'required',
            'post_type_id' => 'required',
            'contentText'  => 'required',
            'time_delete'  => 'required',
        ];
    }
    public function messages()
    {
        return [
            'category_id.required'    => 'Chọn category cho bài viết',
            'title.required'          => 'Nhập tên title',
            'post_type_id.required'   => 'Chọn post type cho bài viết',
            'contentText'             => 'Nhập nội dung bài viết',
            'time_delete'             => 'Chọn kiểu hiện thị',
        ];
    }
}
