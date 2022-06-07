<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            "lastname" => "required",
            "address" => "required",
            "identification_number" => "required",
            "city_id" => "required",
            "postal_code" => "required",
        ];
    }
}
