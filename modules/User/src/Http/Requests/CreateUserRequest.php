<?php

namespace Modules\User\src\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        $id = $this->route()->user ? $this->route()->user : null;
        $rules = [
            'username' => 'required|string|max:512|unique:users,username',
            'fullname' => 'required|string|max:1024',
            'email' => 'required|string|email|max:1024|unique:users,email',
            'password' => 'required|string|min:8',
            'group_id' => 'required|string',
        ];

        if ($id) {
            unset($rules['username']);
            $rules['email'] = 'required|string|email|max:1024|unique:users,email,' . $id;
            if (!$this->password) {
                unset($rules['password']);
            } else {
                $rules['password'] = 'nullable|string|min:8';
            }
        }

        return $rules;
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'required' => __('User::validation.required'),
            'string' => __('User::validation.string'),
            'max' => __('User::validation.max'),
            'min' => __('User::validation.min'),
            'unique' => __('User::validation.unique'),
            'email' => __('User::validation.email'),
        ];
    }

    /**
     * Get the validation attributes that apply to the request.
     *
     * @return array<string, string>
     */
    public function attributes(): array
    {
        return [
            'username' => __('User::attributes.username'),
            'fullname' => __('User::attributes.fullname'),
            'email' => __('User::attributes.email'),
            'password' => __('User::attributes.password'),
            'group_id' => __('User::attributes.group_id'),
        ];
    }
}
