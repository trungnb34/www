<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditStaticPagesAdminRequest extends FormRequest
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
            'title'       => 'required',
            'contentText' => 'required',
            'status_show' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'title.required'        => 'Nhập tên bài viết',
            'contentText.required'  => 'Nhập nội dung bài viết',
            'status_show.required'  => 'Chọn kiểu hiển thị'
        ];
    }
}
