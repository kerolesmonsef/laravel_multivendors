<?php

namespace Modules\Admin\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminAddEditLanguageRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:100',
            'short_cut' => 'required|string|max:10',
            'active' => 'nullable|in:on',
            'direction' => 'required|in:rtl,ltr',
        ];
    }


    public function messages()
    {
        return [
            'required' => 'هذا الحقل مطلوب',
            'in' => 'القيم المدخلة غير صحيحة ',
            'name.string' => 'اسم اللغة لابد ان يكون احرف',
            'short_cut.max' => 'هذا الحقل لابد الا يزيد عن 10 احرف ',
            'short_cut.string' => 'هذا الحقل لابد ان يكون احرف ',
            'name.max' => 'اسم اللغة لابد الا يزيد عن 100 احرف ',
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}
