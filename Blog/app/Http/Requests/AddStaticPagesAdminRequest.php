<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddStaticPagesAdminRequest extends FormRequest
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
            'title' => 'required|unique:static_pages,title',
            'contentText' => 'required',
            'status_show' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'title.required' => 'Chọn tên cho bài viết',
            'title.unique'   => 'Tên bài viết đã bị trùng',
            'contentText.required'  => 'Nhập nội dung bài viết',
            'status_show.required'  => 'Bạn chọn cách hiển thị',
        ];
    }
}
