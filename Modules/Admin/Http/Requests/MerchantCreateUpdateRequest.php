<?php

namespace Modules\Admin\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MerchantCreateUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'name' => ['bail', 'required', 'string', 'min:3', 'max:50'],
            'email' => ['bail', 'required', 'string', 'min:3', 'email', 'max:50'],
            'mobile' => ['bail', 'required', 'string', 'min:8', 'max:15'],
            'latitude' => ['bail', 'required', 'numeric', 'min:-360', 'max:360'],
            'longitude' => ['bail', 'required', 'numeric', 'min:-360', 'max:360'],
            'active' => ['bail', 'in:on'],
            'category_id' => ['bail', 'required', 'numeric', 'exists:main_categories,id'],
            'address' => ['bail', 'required', 'string', 'min:3', 'max:200'],
        ];
        $merchant = $this->route()->parameter('merchant');
        if (is_null($merchant)) { // store
            $rules['email'][] = "unique:users,email";
            $rules['mobile'][] = "unique:users,mobile";
            $rules['logo'] = 'required|mimes:jpg,jpeg,png';
            $rules['password'] = 'required|string|min:6';
        } else { // update
            $user = $merchant->user;
            $rules['email'][] = "unique:users,email,$user->id";
            $rules['mobile'][] = "unique:users,mobile,$user->id";
            $rules['photo'] = 'nullable|mimes:jpg,jpeg,png';
        }
        return $rules;
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
