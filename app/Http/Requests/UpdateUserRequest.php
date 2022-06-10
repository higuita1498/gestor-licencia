<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
            "username" => "required|unique:users,username," . $this->user->id,
            "email" => "required|unique:users,email," . $this->user->id,
            "name" => "required",
            "last_name" => "required",
            "address" => "required",
            "identification_number" => "required|unique:users,identification_number," . $this->user->id,
            "city_id" => "required",
            "postal_code" => "required",
        ];
    }
}
