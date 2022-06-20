<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            'UserID' => 'required|unique:users,UserID',
            'UserContactNumber' => 'required|unique:users,UserContactNumber',
            'UserName' => 'required|string|max:255|unique:users,UserName',
            'partner_id' => 'required|integer|exists:partners,id',
            'city_id' => 'required|integer|exists:cities,id',
        ];
    }
}
