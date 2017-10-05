<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddPostAdminRequest extends FormRequest
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
            'title' => 'required|unique:post,title',
            'category_id' => 'required',
            'post_type_id' => 'required',
            'contentText'  => 'required',
            'time_delete'  => 'required',
            'avatar'       => 'required',
        ];
    }
    public function messages()
    {
        return [
            'title.required'          => 'Nhập tên title',
            'title.unique'            => 'Tên title đã bị trùng',
            'category_id.required'    => 'Chọn category cho bài viết',
            'post_type_id.required'   => 'Chọn post type cho bài viết',
            'contentText'             => 'Nhập nội dung bài viết',
            'time_delete'             => 'Chọn kiểu hiện thị',
            'avatar.required'         => 'Chọn ảnh avatar cho bài viết'
        ];
    }
}
